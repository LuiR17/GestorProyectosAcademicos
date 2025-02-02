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
        Schema::table('projects', function (Blueprint $table) {
            //
            Schema::table('projects', function (Blueprint $table) {
                $table->string('original_file_name')->nullable(); // Agregar columna para el nombre original
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('original_file_name');
            });
        });
    }
};
