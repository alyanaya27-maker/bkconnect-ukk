<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'wali_kelas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function counselingRequests()
    {
        return $this->hasMany(CounselingRequest::class);
    }

    public function developmentReports()
    {
        return $this->hasMany(StudentDevelopmentReport::class);
    }

}
