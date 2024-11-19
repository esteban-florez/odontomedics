<?php

use App\Enums\Diagnosis;
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
            $table->date('date');
            $table->time('time');
            $table->boolean('canceled')->default(false);
            $table->enum('diagnosis', Diagnosis::values()->all())->nullable();
            $table->foreignId('patient_id');
            $table->foreignId('doctor_id')->nullable();
            $table->foreignId('procedure_id')->nullable();
            $table->timestamps();
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
