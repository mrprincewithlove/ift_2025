<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->text('text_tm');
            $table->text('text_ru')->nullable();
            $table->text('text_en')->nullable();

            $table->text('about_tm');
            $table->text('about_ru')->nullable();
            $table->text('about_en')->nullable();

            $table->text('title_tm')->nullable();
            $table->text('title_ru')->nullable();
            $table->text('title_en')->nullable();

            $table->text('abouttext2_tm')->nullable();
            $table->text('abouttext2_ru')->nullable();
            $table->text('abouttext2_en')->nullable();

            $table->string('logofull')->nullable();
            $table->string('logosmall')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('address_tm');
            $table->string('address_ru')->nullable();
            $table->string('address_en')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
};
