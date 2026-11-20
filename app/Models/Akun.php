<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $fillable = [
        'nama', 'email', 'password', 'role', 'status', 'nip', 'no_hp', 'kelas',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
