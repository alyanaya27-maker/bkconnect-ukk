<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE users
            MODIFY role ENUM(
                'siswa',
                'guru_bk',
                'wali_kelas',
                'admin'
            ) NOT NULL DEFAULT 'siswa'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE users
            MODIFY role ENUM(
                'siswa',
                'guru_bk'
            ) NOT NULL DEFAULT 'siswa'
        ");
    }
};
