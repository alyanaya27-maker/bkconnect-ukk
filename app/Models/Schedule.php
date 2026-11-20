<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'student_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function counselingRequests()
    {
        return $this->hasMany(CounselingRequest::class);
    }
}
