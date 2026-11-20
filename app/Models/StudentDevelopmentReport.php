<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDevelopmentReport extends Model
{
    protected $fillable = [
        'student_id',
        'wali_kelas_id',
        'guru_bk_id',
        'perkembangan',
        'catatan',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class);
    }

    public function guruBk()
    {
        return $this->belongsTo(GuruBk::class);
    }
}
