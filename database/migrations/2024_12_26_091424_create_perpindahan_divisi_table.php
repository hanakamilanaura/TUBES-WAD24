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
        Schema::create('perpindahan_divisi', function (Blueprint $table) {
            $table->id();
            $table->string('NamaKaryawan');
            $table->string('DivisiSebelum');
            $table->string('DivisiSesudah');
            $table->date('Tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpindahan_divisi');
    }



};
