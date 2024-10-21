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
        Schema::table('homepages', function (Blueprint $table) {
            $table->string('feature_icon1')->nullable();
            $table->string('feature_icon2')->nullable();
            $table->string('feature_icon3')->nullable();
            $table->string('feature_icon4')->nullable();
            $table->string('feature_icon5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepages', function (Blueprint $table) {
            $table->dropColumn('feature_icon1');
            $table->dropColumn('feature_icon2');
            $table->dropColumn('feature_icon3');
            $table->dropColumn('feature_icon4');
            $table->dropColumn('feature_icon5');
        });
    }
};
