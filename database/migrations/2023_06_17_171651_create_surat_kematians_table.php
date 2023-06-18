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
        Schema::create('surat_kematians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->date('tanggal_meninggal');
            $table->string('no_kk');
            $table->string('nik');
            $table->enum('gender', ['L', 'P']);
            $table->integer('umur');
            $table->string('tempat_meninggal');
            $table->string('sebab_meninggal');
            $table->enum('status', ['acc', 'tidak acc', 'sedang diproses']);
            $table->string('scan_ktp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kematians');
    }
};
