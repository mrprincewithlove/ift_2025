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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('middle_name')->nullable();
            $table->string('company_name');
            $table->string('job');
            $table->string('country');
            $table->string('number');
            $table->string('emergency_number')->nullable();
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('status');
            $table->string('visa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_forms');
    }
};
