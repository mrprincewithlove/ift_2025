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
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('middle_name');
            $table->date('born_date');
            $table->string('born_place');
            $table->string('citizen');
            $table->string('passport_number');
            $table->string('passport_date');
            $table->string('education');
            $table->string('coming_text');
            $table->string('visa_date');
            $table->string('hotel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
