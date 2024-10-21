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
        Schema::table('homepage_translations', function (Blueprint $table) {
            $table->text('home2_intro_title')->nullable();
            $table->text('home2_intro_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_translations', function (Blueprint $table) {
            $table->dropColumn('home2_intro_title');
            $table->dropColumn('home2_intro_description');
        });
    }
};
