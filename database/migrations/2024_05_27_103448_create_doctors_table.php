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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->integer('phone_num')->unique();
            $table->integer('age')->unsinged();
            $table->string('speciality');
            $table->string('schedule');
            $table->time('shift_start')->unsinged();
            $table->time('shift_end')->unsinged();
            $table->integer('cut')->unsinged();
            $table->integer('amount_due')->unsinged()->default(0);;



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
