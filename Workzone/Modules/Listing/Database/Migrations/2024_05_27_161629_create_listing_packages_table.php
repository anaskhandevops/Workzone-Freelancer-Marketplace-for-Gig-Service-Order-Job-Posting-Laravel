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
        Schema::create('listing_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('listing_id');
            $table->string('basic_name');
            $table->text('basic_description');
            $table->decimal('basic_price', 8, 2);
            $table->string('basic_delivery_date')->default(0);
            $table->string('basic_revision')->default(0);
            $table->string('basic_fn_website')->default('no');
            $table->string('basic_page')->default(0);
            $table->string('basic_responsive')->default('no');
            $table->string('basic_source_code')->default('no');
            $table->string('basic_content_upload')->default('no');
            $table->string('basic_speed_optimized')->default('no');

            $table->string('standard_name');
            $table->text('standard_description');
            $table->decimal('standard_price', 8, 2);
            $table->string('standard_delivery_date')->default(0);
            $table->string('standard_revision')->default(0);
            $table->string('standard_fn_website')->default('no');
            $table->string('standard_page')->default(0);
            $table->string('standard_responsive')->default('no');
            $table->string('standard_source_code')->default('no');
            $table->string('standard_content_upload')->default('no');
            $table->string('standard_speed_optimized')->default('no');

            $table->string('premium_name');
            $table->text('premium_description');
            $table->decimal('premium_price', 8, 2);
            $table->string('premium_delivery_date')->default(0);
            $table->string('premium_revision')->default(0);
            $table->string('premium_fn_website')->default('no');
            $table->string('premium_page')->default(0);
            $table->string('premium_responsive')->default('no');
            $table->string('premium_source_code')->default('no');
            $table->string('premium_content_upload')->default('no');
            $table->string('premium_speed_optimized')->default('no');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_packages');
    }
};
