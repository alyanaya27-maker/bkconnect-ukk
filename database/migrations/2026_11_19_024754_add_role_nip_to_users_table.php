<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'status')) {
                $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif')->nullable();
            }
            if (! Schema::hasColumn('users', 'nip')) {
                $table->string('nip')->nullable()->unique();
            }
            if (! Schema::hasColumn('users', 'no_hp')) {
                $table->string('no_hp')->nullable();
            }
            if (! Schema::hasColumn('users', 'kelas')) {
                $table->string('kelas')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            foreach (['status', 'nip', 'no_hp', 'kelas'] as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
