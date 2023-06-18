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
        Schema::table('s_k_t_m_s', function (Blueprint $table) {
            $table->string('jenis_surat')->default('Surat Keterangan Tidak Mampu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('s_k_t_m_s', function (Blueprint $table) {
            $table->dropColumn('jenis_surat');
        });
    }
};
