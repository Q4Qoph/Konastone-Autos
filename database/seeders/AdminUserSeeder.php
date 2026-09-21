<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = (string) env('ADMIN_EMAIL', 'admin@konastone.test');
        $admin = User::firstOrNew(['email' => $email]);

        if (! $admin->exists) {
            $admin->password = Hash::make((string) env('ADMIN_PASSWORD', 'password'));
        }

        $admin->name = (string) env('ADMIN_NAME', 'Konastone Admin');
        $admin->is_staff = true;
        $admin->email_verified_at ??= now();
        $admin->save();
    }
}
