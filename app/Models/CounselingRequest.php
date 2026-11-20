<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounselingRequest extends Model
{
    protected $fillable = [
        'student_id',
        'schedule_id',
        'alasan',
        'status',
        'catatan',
        'perkembangan_konseling',
        'ringkasan',
        'tindak_lanjut',
        'pesan_untuk_siswa',
    ];
      
    protected $casts = [
        'ringkasan'     => 'encrypted',
        'tindak_lanjut' => 'encrypted',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

}
