<?php

namespace App\Console\Commands;

use App\Models\AuthenticationLog;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class RetireDefaultStaffAccount extends Command
{
    protected $signature = 'staff:retire-default-account';

    protected $description = 'Remove the legacy admin@konastone.test account after an owner has verified their email';

    public function handle(): int
    {
        return DB::transaction(function (): int {
            $owners = User::query()->where('is_staff', true)->where('is_owner', true)
                ->whereNotNull('email_verified_at')->lockForUpdate()->get();
            $user = User::query()->where('email', 'admin@konastone.test')->lockForUpdate()->first();

            if (! $user) {
                $this->info('The legacy admin account has already been removed.');

                return self::SUCCESS;
            }

            if (! $owners->contains(fn (User $owner): bool => ! $owner->is($user))) {
                $this->error('Create and verify another owner before removing the legacy account.');

                return self::FAILURE;
            }

            AuthenticationLog::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'event' => 'legacy_account_removed',
            ]);
            DB::table('sessions')->where('user_id', $user->id)->delete();
            Password::broker()->deleteToken($user);
            $user->delete();
            $this->info('Removed the legacy admin account, its sessions, and its password reset tokens.');

            return self::SUCCESS;
        });
    }
}
