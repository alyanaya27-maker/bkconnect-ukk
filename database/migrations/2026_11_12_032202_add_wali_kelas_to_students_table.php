<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('students', 'wali_kelas')) {
            Schema::table('students', function (Blueprint $table) {
                $table->string('wali_kelas')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Kolom tidak dihapus agar data yang sudah ada tetap aman.
    }
};