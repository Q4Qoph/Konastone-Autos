<?php

namespace App\Console\Commands;

use App\Actions\Admin\SaveStaffAction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class CreateOwner extends Command
{
    protected $signature = 'staff:bootstrap-owner {email} {--name=Konastone Owner} {--send-setup-link : Send a password setup link instead of entering a password} {--resend-setup-link : Send a fresh link immediately to an existing active owner}';

    protected $description = 'Create or promote the initial owner without a default password';

    public function handle(): int
    {
        if ($this->option('resend-setup-link')) {
            $owner = User::query()->where('email', Str::lower(trim((string) $this->argument('email'))))
                ->where('is_staff', true)->where('is_owner', true)->first();

            if (! $owner) {
                $this->error('The account must already be an active owner.');

                return self::FAILURE;
            }

            (new SaveStaffAction)->sendInvitation($owner, $owner, 'sync');
            $this->info('A fresh owner password setup link was sent using the configured mailer.');

            return self::SUCCESS;
        }

        if (User::query()->where('is_staff', true)->where('is_owner', true)->exists()) {
            $this->error('An active owner already exists. Manage additional owners through Staff accounts.');

            return self::FAILURE;
        }

        $email = Str::lower(trim((string) $this->argument('email')));
        $data = ['email' => $email, 'name' => $this->option('name')];
        $rules = ['email' => ['required', 'email', 'max:255'], 'name' => ['required', 'string', 'max:255']];
        $user = User::firstOrNew(['email' => $email]);

        if (! $this->option('send-setup-link')) {
            $data['password'] = $this->input->isInteractive() ? $this->secret('Choose a strong owner password') : null;
            $rules['password'] = ['required', Password::min(12)->mixedCase()->numbers()->symbols()];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());

            return self::FAILURE;
        }

        $user->fill(['name' => $data['name'], 'email' => $email]);
        $user->is_staff = true;
        $user->is_owner = true;

        if (isset($data['password'])) {
            $user->password = $data['password'];
        } elseif (! $user->exists) {
            $user->password = Str::random(64);
        }

        $user->save();

        if ($this->option('send-setup-link')) {
            (new SaveStaffAction)->sendInvitation($user, $user);
            $this->info('Owner created. Password setup link queued using the configured mailer.');
        } else {
            $this->info('Owner created. Email verification is required at first login.');
        }

        return self::SUCCESS;
    }
}
