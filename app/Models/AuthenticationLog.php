<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'actor_id', 'event', 'email', 'ip_address', 'changes'])]
class AuthenticationLog extends Model
{
    protected function casts(): array
    {
        return ['changes' => 'array'];
    }
}
