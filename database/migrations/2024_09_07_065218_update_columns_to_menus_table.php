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
        Schema::table('menus', function (Blueprint $table) {
            // $table->string('slug')->nullable()->after('id');
            $table->unsignedBigInteger('menu_type_id')->after('slug')->nullable();
            $table->foreign('menu_type_id')->references('id')->on('menu_types')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->after('status');;
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            //
        });
    }
};
