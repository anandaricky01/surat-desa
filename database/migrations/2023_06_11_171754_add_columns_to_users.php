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
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable();
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('no_hp')->nullable();
        });
        // No.KK,
        // NIK,
        // Jenis Kelamin,
        // Tempat Lahir,
        // Tanggal Lahir,
        // Alamat,
        // Pekerjaan,
        // No. HP,
        // Email,
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('no_kk');
            $table->dropColumn('nik');
            $table->dropColumn('gender', ['L', 'P']);
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('alamat');
            $table->dropColumn('pekerjaan');
            $table->dropColumn('no_hp');
        });
    }
};
