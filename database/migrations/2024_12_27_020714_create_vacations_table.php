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
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('reason');
            $table->unsignedBigInteger('id_employee');
            $table->unsignedBigInteger('edit_by');
            $table->enum('status', ['approved', 'rejected', 'pending']);
            $table->foreign('id_employee')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('edit_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacations');
    }
};
