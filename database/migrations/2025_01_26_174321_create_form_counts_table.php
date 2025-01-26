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
        Schema::create('form_counts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration')->default(0);
            $table->unsignedBigInteger('flight')->default(0);
            $table->unsignedBigInteger('visa')->default(0);
            $table->unsignedBigInteger('logistic')->default(0);
            $table->unsignedBigInteger('hotel')->default(0);
            $table->unsignedBigInteger('city_tours')->default(0);
            $table->unsignedBigInteger('request_call')->default(0);
            $table->unsignedBigInteger('feedback')->default(0);
            $table->unsignedBigInteger('test')->default(0);
            $table->unsignedBigInteger('another_form')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_counts');
    }
};
