<?php

namespace App\Listeners;

use App\Models\AuthenticationLog;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Verified;

class RecordAuthenticationEvent
{
    public function handle(Login|Failed|Logout|PasswordReset|Verified $event): void
    {
        AuthenticationLog::create([
            'user_id' => $event->user?->getAuthIdentifier(),
            'email' => $event->user?->email ?? (isset($event->credentials['email']) ? mb_substr((string) $event->credentials['email'], 0, 255) : null),
            'event' => match (true) {
                $event instanceof Login => 'login',
                $event instanceof Failed => 'login_failed',
                $event instanceof Logout => 'logout',
                $event instanceof Verified => 'email_verified',
                default => 'password_reset',
            },
            'ip_address' => request()->ip(),
        ]);
    }
}
