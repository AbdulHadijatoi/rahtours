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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_text')->nullable();
            $table->string('hero_btn_text')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('home_section_1_text')->nullable();
            $table->string('home_insights_text')->nullable();
            $table->string('choose_us_text')->nullable();
            
            $table->string('footer_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
