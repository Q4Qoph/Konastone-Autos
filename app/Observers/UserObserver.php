<?php

namespace App\Observers;

use App\Models\AuthenticationLog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserObserver
{
    public function updating(User $user): void
    {
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($user->isDirty(['password', 'email', 'is_staff', 'is_owner'])) {
            $user->remember_token = Str::random(60);
            $sessions = DB::table('sessions')->where('user_id', $user->id);

            if (! $user->isDirty(['email', 'is_staff', 'is_owner']) && request()->hasSession()) {
                $sessions->where('id', '!=', request()->session()->getId());
            }

            $sessions->delete();
        }
    }

    public function created(User $user): void
    {
        if ($user->is_staff) {
            $this->record($user, 'staff_created', $user->only(['is_staff', 'is_owner']));
        }
    }

    public function updated(User $user): void
    {
        $changes = [];

        foreach (['name', 'email', 'is_staff', 'is_owner'] as $attribute) {
            if ($user->wasChanged($attribute)) {
                $changes[$attribute] = ['before' => $user->getOriginal($attribute), 'after' => $user->{$attribute}];
            }
        }

        if ($changes !== []) {
            $this->record($user, 'account_updated', $changes);
        }

        if ($user->wasChanged('password')) {
            $this->record($user, 'password_changed', []);
        }
    }

    /** @param array<string, mixed> $changes */
    private function record(User $user, string $event, array $changes): void
    {
        AuthenticationLog::create([
            'user_id' => $user->id,
            'actor_id' => auth()->id(),
            'email' => $user->email,
            'event' => $event,
            'ip_address' => request()->ip(),
            'changes' => $changes,
        ]);
    }
}
