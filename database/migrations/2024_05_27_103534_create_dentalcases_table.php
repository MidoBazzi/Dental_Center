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
        Schema::create('dentalcases', function (Blueprint $table) {
            $table->id();
            $table->string('desc');
            $table->foreignId("doctor_id")->constrained("doctors")->cascadeOnDelete();
            $table->foreignId("patient_id")->constrained("patients")->cascadeOnDelete();
            $table->integer('amount')->unsinged();
            $table->boolean('status')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentalcases');
    }
};
