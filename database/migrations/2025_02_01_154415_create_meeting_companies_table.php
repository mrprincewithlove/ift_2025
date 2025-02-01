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
        Schema::create('meeting_companies', function (Blueprint $table) {
            $table->id();

            $table->string('name_tm')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();

            $table->string('image_tm')->nullable();
            $table->string('image_ru')->nullable();
            $table->string('image_en')->nullable();

            $table->string('link')->nullable();

            $table->foreignId('label_id')->nullable()->references('id')->on('labels');

            $table->tinyInteger('status')->default(1);
            $table->integer('position')->default(1);
            $table->foreignId('updated_by')->nullable()->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_companies');
    }
};
