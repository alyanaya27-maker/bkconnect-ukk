<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('wali_kelas', 'guru_bk_id')) {
            Schema::table('wali_kelas', function (Blueprint $table) {
                $table->foreignId('guru_bk_id')
                    ->nullable()
                    ->after('user_id')
                    ->constrained('guru_bks')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('wali_kelas', 'guru_bk_id')) {
            Schema::table('wali_kelas', function (Blueprint $table) {
                $table->dropForeign(['guru_bk_id']);
                $table->dropColumn('guru_bk_id');
            });
        }
    }
};
