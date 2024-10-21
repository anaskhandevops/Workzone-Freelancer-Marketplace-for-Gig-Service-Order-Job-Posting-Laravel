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
            $table->string('feature_title1')->nullable();
            $table->string('feature_title2')->nullable();
            $table->string('feature_title3')->nullable();
            $table->string('feature_title4')->nullable();
            $table->string('feature_title5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_translations', function (Blueprint $table) {
            $table->dropColumn('feature_title1');
            $table->dropColumn('feature_title2');
            $table->dropColumn('feature_title3');
            $table->dropColumn('feature_title4');
            $table->dropColumn('feature_title5');
        });
    }
};
