<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $fillable = ['email', 'token', 'auth_token', 'created_at'];
    public $timestamps = false;
}
