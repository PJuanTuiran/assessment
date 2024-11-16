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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users');
            $table->foreignId('doctor_id')->constrained('users');
            $table->dateTime('date_time');
            $table->enum('status', ['pendiente', 'confirmada', 'cancelada', 'completada'])->default('pendiente');
            $table->string('reason');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['doctor_id', 'date_time'], 'unique_doctor_date_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
