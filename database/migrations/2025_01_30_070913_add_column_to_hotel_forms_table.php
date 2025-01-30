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
        Schema::table('hotel_forms', function (Blueprint $table) {
            //
            $table->string('room')->nullable()->after('hotel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_forms', function (Blueprint $table) {
            //
            $table->dropColumn('room');
        });
    }
};
