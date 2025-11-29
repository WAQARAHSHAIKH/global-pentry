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
    Schema::create('recipes', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // From add_recipe_modal.blade.php
        $table->text('description')->nullable(); // From add_recipe_modal.blade.php
        $table->string('image')->nullable();
        $table->string('cuisine')->nullable(); // From add_recipe_modal.blade.php
        $table->integer('prep_time')->nullable(); // From add_recipe_modal.blade.php
        $table->text('instructions')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
