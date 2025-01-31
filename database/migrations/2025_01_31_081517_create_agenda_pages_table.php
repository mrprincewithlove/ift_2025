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
        Schema::create('agenda_pages', function (Blueprint $table) {
            $table->id();
            $table->string('main_background_image')->nullable();
            $table->string('main_breadcrumb_title_tm')->nullable();
            $table->string('main_breadcrumb_title_ru')->nullable();
            $table->string('main_breadcrumb_title_en')->nullable();

            $table->string('title_tm')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();

            $table->foreignId('updated_by')->nullable()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_pages');
    }
};
