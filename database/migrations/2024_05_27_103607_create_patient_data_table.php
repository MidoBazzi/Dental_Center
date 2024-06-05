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
        Schema::create('patient_data', function (Blueprint $table) {
            $table->id();
            $table->string('picture');
            $table->foreignId("dentalcase_id")->constrained("dentalcases")->cascadeOnDelete();
            $table->foreignId("patient_id")->constrained("patients")->cascadeOnDelete();
            $table->date('date');
            $table->string('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_data');
    }
};
