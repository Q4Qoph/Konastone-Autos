<?php

namespace App\Actions\Admin;

use App\Models\User;
use Filament\Auth\Notifications\ResetPassword;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SaveStaffAction
{
    /** @param array<string, mixed> $data */
    public function handle(array $data, User $actor, ?User $record = null): User
    {
        Gate::forUser($actor->fresh())->authorize($record ? 'update' : 'create', $record ?? User::class);
        $data = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($record?->id)],
            'role' => ['required', Rule::in(['owner', 'sales'])],
            'is_staff' => ['required', 'boolean'],
        ])->validate();

        $user = DB::transaction(function () use ($data, $actor, $record): User {
            $owners = User::query()->where('is_staff', true)->where('is_owner', true)->lockForUpdate()->get();
            abort_unless($owners->contains('id', $actor->id), 403);
            $user = $record ? User::query()->lockForUpdate()->findOrFail($record->id) : new User;
            $removesOwner = ! $data['is_staff'] || $data['role'] !== 'owner';

            if ($user->is($actor) && $removesOwner) {
                throw ValidationException::withMessages(['role' => 'You cannot remove your own owner access.']);
            }

            if ($user->isOwner() && $removesOwner && $owners->count() <= 1) {
                throw ValidationException::withMessages(['role' => 'At least one active owner is required.']);
            }

            $user->fill(['name' => $data['name'], 'email' => $data['email']]);
            $user->is_staff = $data['is_staff'];
            $user->is_owner = $data['role'] === 'owner';

            if (! $user->exists) {
                $user->password = Str::random(64);
            }

            $user->save();

            return $user;
        });

        if ($record === null && $user->is_staff) {
            $this->sendInvitation($user, $actor);
        }

        return $user;
    }

    public function sendInvitation(User $user, User $actor, ?string $connection = null): void
    {
        Gate::forUser($actor->fresh())->authorize('update', $user);
        abort_unless($user->fresh()->is_staff, 403);

        $status = Password::broker()->sendResetLink(['email' => $user->email], function (User $user, string $token) use ($connection): void {
            $notification = new ResetPassword($token);
            $notification->url = Filament::getPanel('admin')->getResetPasswordUrl($token, $user);
            if ($connection !== null) {
                $notification->onConnection($connection);
            }

            $user->notify($notification->afterCommit());
        });

        if ($status !== Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages(['email' => __($status)]);
        }
    }
}
