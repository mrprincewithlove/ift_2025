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
        Schema::create('visa_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('middle_name')->nullable();
            $table->string('company_name');
            $table->string('job');
            $table->string('email');
            $table->date('birth_date');
            $table->string('country');
            $table->string('address');
            $table->string('passport');
            $table->date('date_issue');
            $table->date('date_expiry');
            $table->string('education');
            $table->string('education_institute');
            $table->string('specialization');
            $table->string('purpose');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->string('website');
            $table->string('hotel');
            $table->string('photo');
            $table->string('passport_copy');
            $table->string('employment_verification_letter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_forms');
    }
};
