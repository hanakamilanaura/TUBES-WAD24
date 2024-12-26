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
        Schema::create('laporan_absensi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('NamaKaryawan');
            $table->string('DivisiKaryawan');
            $table->date('Tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_absensi');
    }
};
