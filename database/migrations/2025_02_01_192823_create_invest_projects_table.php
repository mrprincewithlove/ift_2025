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
        Schema::create('invest_projects', function (Blueprint $table) {
            $table->id();

            $table->string('image')->nullable();

            $table->string('title_tm')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();

            $table->longText('text_tm')->nullable();
            $table->longText('text_ru')->nullable();
            $table->longText('text_en')->nullable();

            $table->string('file_tm')->nullable();
            $table->string('file_ru')->nullable();
            $table->string('file_en')->nullable();

            $table->foreignId('type_id')->nullable()->references('id')->on('types');

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
        Schema::dropIfExists('invest_projects');
    }
};
