<?php

namespace Tests\Feature;

use App\Actions\Admin\SaveStaffAction;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Models\AuthenticationLog;
use App\Models\User;
use Filament\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Filament\Auth\Pages\EditProfile;
use Filament\Auth\Pages\Login;
use Filament\Auth\Pages\PasswordReset\RequestPasswordReset;
use Filament\Auth\Pages\PasswordReset\ResetPassword;
use Filament\Facades\Filament;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Livewire\Livewire;
use Tests\TestCase;

class AuthenticationWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }

    public function test_staff_can_log_in_with_credentials_and_logout(): void
    {
        $user = User::factory()->staff()->create();

        Livewire::test(Login::class)->fillForm(['email' => $user->email, 'password' => 'password'])->call('authenticate')->assertHasNoFormErrors();

        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('authentication_logs', ['user_id' => $user->id, 'event' => 'login']);

        $this->post('/admin/logout')->assertRedirect();

        $this->assertGuest();
        $this->assertDatabaseHas('authentication_logs', ['user_id' => $user->id, 'event' => 'logout']);
    }

    public function test_invalid_credentials_are_rejected_and_audited_without_the_password(): void
    {
        $user = User::factory()->staff()->create();

        Livewire::test(Login::class)->fillForm(['email' => $user->email, 'password' => 'Wrong-password!'])->call('authenticate')->assertHasFormErrors(['email']);

        $this->assertGuest();
        $this->assertDatabaseHas('authentication_logs', ['email' => $user->email, 'event' => 'login_failed']);
        $this->assertStringNotContainsString('Wrong-password!', AuthenticationLog::query()->get()->toJson());
    }

    public function test_non_staff_cannot_log_in_even_with_the_correct_password(): void
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)->fillForm(['email' => $user->email, 'password' => 'password'])->call('authenticate')->assertHasFormErrors(['email']);

        $this->assertGuest();
    }

    public function test_login_is_throttled_after_repeated_attempts(): void
    {
        $user = User::factory()->staff()->create();
        $login = Livewire::test(Login::class)->fillForm(['email' => $user->email, 'password' => 'wrong']);

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $login->call('authenticate');
        }

        $login->fillForm(['email' => $user->email, 'password' => 'password'])->call('authenticate');

        $this->assertGuest();
    }

    public function test_unverified_staff_must_verify_email_before_accessing_the_panel(): void
    {
        $user = User::factory()->staff()->unverified()->create();

        $this->actingAs($user)->get('/admin')->assertRedirect(route('filament.admin.auth.email-verification.prompt'));
    }

    public function test_email_verification_uses_signed_links_and_marks_the_account_verified(): void
    {
        $staff = User::factory()->staff()->unverified()->create();
        $this->actingAs($staff);
        $verificationUrl = Filament::getPanel('admin')->getVerifyEmailUrl($staff);

        $this->get($verificationUrl.'&tampered=true')->assertForbidden();
        $this->assertFalse($staff->fresh()->hasVerifiedEmail());

        $this->get($verificationUrl)->assertRedirect();
        $this->assertTrue($staff->fresh()->hasVerifiedEmail());
        $this->assertDatabaseHas('authentication_logs', ['user_id' => $staff->id, 'event' => 'email_verified']);
    }

    public function test_staff_can_request_a_panel_password_reset_link(): void
    {
        Notification::fake();
        $user = User::factory()->staff()->create();

        Livewire::test(RequestPasswordReset::class)->fillForm(['email' => $user->email])->call('request')->assertHasNoFormErrors();

        Notification::assertSentTo($user, ResetPasswordNotification::class, fn (ResetPasswordNotification $notification): bool => str_contains($notification->url, '/admin/password-reset/reset'));
    }

    public function test_non_staff_does_not_receive_a_panel_password_reset_link(): void
    {
        Notification::fake();
        $user = User::factory()->create();

        Livewire::test(RequestPasswordReset::class)->fillForm(['email' => $user->email])->call('request');

        Notification::assertNothingSent();
    }

    public function test_valid_reset_changes_password_and_cannot_be_reused(): void
    {
        $user = User::factory()->staff()->create();
        $token = Password::createToken($user);
        $newPassword = 'Secure-New-Password123!';

        Livewire::test(ResetPassword::class, ['email' => $user->email, 'token' => $token])
            ->fillForm(['email' => $user->email, 'password' => $newPassword, 'passwordConfirmation' => $newPassword])
            ->call('resetPassword')->assertHasNoFormErrors();

        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
        $this->assertFalse(Password::tokenExists($user, $token));
        $this->assertDatabaseHas('authentication_logs', ['user_id' => $user->id, 'event' => 'password_reset']);

        Livewire::test(ResetPassword::class, ['email' => $user->email, 'token' => $token])
            ->fillForm(['email' => $user->email, 'password' => 'Different-Secure123!', 'passwordConfirmation' => 'Different-Secure123!'])
            ->call('resetPassword');

        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
    }

    public function test_expired_reset_tokens_do_not_change_the_password(): void
    {
        $user = User::factory()->staff()->create();
        $token = Password::createToken($user);
        $this->travel(61)->minutes();

        Livewire::test(ResetPassword::class, ['email' => $user->email, 'token' => $token])
            ->fillForm(['email' => $user->email, 'password' => 'Different-Secure123!', 'passwordConfirmation' => 'Different-Secure123!'])
            ->call('resetPassword');

        $this->assertTrue(Hash::check('password', $user->fresh()->password));
    }

    public function test_profile_requires_current_password_and_applies_strong_password_rules(): void
    {
        $user = User::factory()->staff()->create();
        $this->actingAs($user);

        Livewire::test(EditProfile::class)->fillForm([
            'name' => $user->name, 'email' => $user->email,
            'password' => 'Secure-New-Password123!', 'passwordConfirmation' => 'Secure-New-Password123!', 'currentPassword' => 'wrong',
        ])->call('save')->assertHasFormErrors(['currentPassword']);

        $this->assertTrue(Hash::check('password', $user->fresh()->password));

        Livewire::test(EditProfile::class)->fillForm([
            'name' => $user->name, 'email' => $user->email,
            'password' => 'short', 'passwordConfirmation' => 'short', 'currentPassword' => 'password',
        ])->call('save')->assertHasFormErrors(['password']);
    }

    public function test_profile_can_change_password_without_granting_owner_access(): void
    {
        $user = User::factory()->staff()->create();
        $this->actingAs($user);

        Livewire::test(EditProfile::class)->fillForm([
            'name' => $user->name, 'email' => $user->email,
            'password' => 'Secure-New-Password123!', 'passwordConfirmation' => 'Secure-New-Password123!', 'currentPassword' => 'password',
            'is_owner' => true,
        ])->call('save')->assertHasNoFormErrors();

        $this->assertTrue(Hash::check('Secure-New-Password123!', $user->fresh()->password));
        $this->assertFalse($user->fresh()->is_owner);
    }

    public function test_reset_rejects_invalid_tokens_and_weak_passwords(): void
    {
        $staff = User::factory()->staff()->create();
        $token = Password::createToken($staff);

        Livewire::test(ResetPassword::class, ['email' => $staff->email, 'token' => $token])
            ->fillForm(['email' => $staff->email, 'password' => 'password', 'passwordConfirmation' => 'password'])
            ->call('resetPassword')->assertHasFormErrors(['password']);

        Livewire::test(ResetPassword::class, ['email' => $staff->email, 'token' => 'invalid-token'])
            ->fillForm(['email' => $staff->email, 'password' => 'Different-Secure123!', 'passwordConfirmation' => 'Different-Secure123!'])
            ->call('resetPassword');

        $this->assertTrue(Hash::check('password', $staff->fresh()->password));
    }

    public function test_owner_can_invite_staff_from_the_resource(): void
    {
        Notification::fake();
        $owner = User::factory()->owner()->create();
        $this->actingAs($owner);

        Livewire::test(CreateUser::class)->fillForm([
            'name' => 'Sales Person', 'email' => 'sales@example.test', 'role' => 'sales', 'is_staff' => true,
        ])->call('create')->assertHasNoFormErrors();

        $staff = User::query()->where('email', 'sales@example.test')->firstOrFail();
        $this->assertTrue($staff->is_staff);
        $this->assertFalse($staff->is_owner);
        $this->assertNull($staff->email_verified_at);
        $this->assertFalse(Hash::check('password', $staff->password));
        Notification::assertSentTo($staff, ResetPasswordNotification::class);
    }

    public function test_sales_staff_cannot_manage_accounts_or_edit_inventory(): void
    {
        $this->actingAs(User::factory()->staff()->create());

        $this->get('/admin/users')->assertForbidden();
        $this->get('/admin/users/create')->assertForbidden();
        $this->get('/admin/authentication-logs')->assertForbidden();
        $this->get('/admin/inventory/create')->assertForbidden();
        $this->get('/admin/inventory')->assertOk();
        $this->get('/admin/leads')->assertOk();
    }

    public function test_owner_can_view_read_only_authentication_history(): void
    {
        $this->actingAs(User::factory()->owner()->create());

        $this->get('/admin/authentication-logs')->assertOk();
        $this->get('/admin/users')->assertOk();
    }

    public function test_owner_can_disable_staff_and_revoke_sessions_and_remember_tokens(): void
    {
        $owner = User::factory()->owner()->create();
        $staff = User::factory()->staff()->create(['remember_token' => 'old-token']);
        DB::table('sessions')->insert(['id' => 'staff-session', 'user_id' => $staff->id, 'payload' => '', 'last_activity' => now()->timestamp]);
        $this->actingAs($owner);

        Livewire::test(EditUser::class, ['record' => $staff->id])->fillForm([
            'name' => $staff->name, 'email' => $staff->email, 'role' => 'sales', 'is_staff' => false,
        ])->call('save')->assertHasNoFormErrors();

        $this->assertFalse($staff->fresh()->is_staff);
        $this->assertNotSame('old-token', $staff->fresh()->remember_token);
        $this->assertDatabaseMissing('sessions', ['id' => 'staff-session']);
        $this->assertDatabaseHas('authentication_logs', ['user_id' => $staff->id, 'actor_id' => $owner->id, 'event' => 'account_updated']);

        $this->actingAs($staff->fresh())->get('/admin')->assertForbidden();
    }

    public function test_owner_can_promote_staff_and_email_changes_require_reverification(): void
    {
        $owner = User::factory()->owner()->create();
        $staff = User::factory()->staff()->create();
        $this->actingAs($owner);

        Livewire::test(EditUser::class, ['record' => $staff->id])->fillForm([
            'name' => $staff->name, 'email' => 'changed@example.test', 'role' => 'owner', 'is_staff' => true,
        ])->call('save')->assertHasNoFormErrors();

        $this->assertTrue($staff->fresh()->isOwner());
        $this->assertNull($staff->fresh()->email_verified_at);
    }

    public function test_sales_cannot_submit_an_owner_invitation_directly(): void
    {
        Notification::fake();
        $staff = User::factory()->staff()->create();

        try {
            (new SaveStaffAction)->handle([
                'name' => 'Attacker', 'email' => 'attacker@example.test', 'role' => 'owner', 'is_staff' => true,
            ], $staff);
            $this->fail('Sales staff must not create accounts.');
        } catch (AuthorizationException) {
            $this->assertDatabaseMissing('users', ['email' => 'attacker@example.test']);
        }

        Notification::assertNothingSent();
    }

    public function test_owner_cannot_remove_their_own_access(): void
    {
        $owner = User::factory()->owner()->create();
        $this->actingAs($owner);

        Livewire::test(EditUser::class, ['record' => $owner->id])->fillForm([
            'name' => $owner->name, 'email' => $owner->email, 'role' => 'sales', 'is_staff' => false,
        ])->call('save')->assertHasFormErrors(['role']);

        $this->assertTrue($owner->fresh()->isOwner());
    }

    public function test_privilege_flags_cannot_be_mass_assigned(): void
    {
        $user = User::factory()->create();

        $user->fill(['is_staff' => true, 'is_owner' => true])->save();

        $this->assertFalse($user->fresh()->is_staff);
        $this->assertFalse($user->fresh()->is_owner);
    }

    public function test_bootstrap_without_a_password_or_setup_link_does_not_create_an_owner(): void
    {
        $this->artisan('staff:bootstrap-owner', ['email' => 'owner@example.test', '--no-interaction' => true])->assertFailed();

        $this->assertDatabaseCount('users', 0);
    }

    public function test_legacy_account_removal_requires_a_verified_owner_and_preserves_history(): void
    {
        $legacy = User::factory()->staff()->create(['email' => 'admin@konastone.test']);
        $owner = User::factory()->owner()->unverified()->create();
        DB::table('sessions')->insert(['id' => 'legacy-session', 'user_id' => $legacy->id, 'payload' => '', 'last_activity' => now()->timestamp]);
        Password::createToken($legacy);

        $this->artisan('staff:retire-default-account')->assertFailed();
        $this->assertDatabaseHas('users', ['id' => $legacy->id]);

        $owner->markEmailAsVerified();
        $this->artisan('staff:retire-default-account')->assertSuccessful();

        $this->assertDatabaseMissing('users', ['email' => 'admin@konastone.test']);
        $this->assertDatabaseHas('users', ['id' => $owner->id]);
        $this->assertDatabaseMissing('sessions', ['id' => 'legacy-session']);
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => 'admin@konastone.test']);
        $this->assertDatabaseHas('authentication_logs', ['email' => 'admin@konastone.test', 'event' => 'legacy_account_removed', 'user_id' => null]);
        $this->artisan('staff:retire-default-account')->assertSuccessful();
    }

    public function test_bootstrap_can_resend_an_existing_owner_link_without_changing_credentials(): void
    {
        Notification::fake();
        $owner = User::factory()->owner()->create();
        $passwordHash = $owner->password;

        $this->artisan('staff:bootstrap-owner', ['email' => $owner->email, '--resend-setup-link' => true])->assertSuccessful();

        $this->assertSame($passwordHash, $owner->fresh()->password);
        Notification::assertSentTo($owner, ResetPasswordNotification::class, fn (ResetPasswordNotification $notification): bool => $notification->connection === 'sync');
    }

    public function test_bootstrap_does_not_send_owner_setup_links_to_sales_accounts(): void
    {
        Notification::fake();
        $staff = User::factory()->staff()->create();

        $this->artisan('staff:bootstrap-owner', ['email' => $staff->email, '--resend-setup-link' => true])->assertFailed();

        Notification::assertNothingSent();
    }

    public function test_bootstrap_owner_queues_a_setup_link_without_auto_verifying_email(): void
    {
        Notification::fake();

        $this->artisan('staff:bootstrap-owner', ['email' => 'owner@example.test', '--send-setup-link' => true])->assertSuccessful();

        $owner = User::query()->where('email', 'owner@example.test')->firstOrFail();
        $this->assertTrue($owner->isOwner());
        $this->assertNull($owner->email_verified_at);
        Notification::assertSentTo($owner, ResetPasswordNotification::class);

        $this->artisan('staff:bootstrap-owner', ['email' => 'other@example.test', '--send-setup-link' => true])->assertFailed();
        $this->assertDatabaseMissing('users', ['email' => 'other@example.test']);
    }
}
