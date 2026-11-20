<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WaliKelas extends Model
{
    protected $fillable = [
        'user_id',
        'guru_bk_id',
        'nip',
        'nama',
        'kelas',
        'email',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guruBk()
    {
        return $this->belongsTo(GuruBk::class);
    }

    public function developmentReports()
    {
        return $this->hasMany(StudentDevelopmentReport::class);
    }
}
