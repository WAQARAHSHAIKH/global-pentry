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
        // Check if the column exists before trying to add it
        if (!Schema::hasColumn('recipes', 'cook_time')) {
            Schema::table('recipes', function (Blueprint $table) {
                // Add the new cook_time column after prep_time
                $table->integer('cook_time')->nullable()->after('prep_time');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if the column exists before trying to remove it
        if (Schema::hasColumn('recipes', 'cook_time')) {
            Schema::table('recipes', function (Blueprint $table) {
                $table->dropColumn('cook_time');
            });
        }
    }
};