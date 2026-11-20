<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class GuruBk extends Model
{
    protected $fillable = [
        'user_id',
        'nip',
        'nama',
        'email',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function waliKelas()
    {
        return $this->hasMany(WaliKelas::class);
    }

    public function developmentReports()
    {
        return $this->hasMany(StudentDevelopmentReport::class);
    }
}
