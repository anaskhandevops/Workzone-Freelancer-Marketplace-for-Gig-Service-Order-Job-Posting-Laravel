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
            $table->string('home2_intro_bg')->nullable();
            $table->string('home2_intro_forground')->nullable();
            $table->text('home2_intro_tags')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepages', function (Blueprint $table) {
            $table->dropColumn('home2_intro_bg');
            $table->dropColumn('home2_intro_forground');
            $table->dropColumn('home2_intro_tags');
        });
    }
};
