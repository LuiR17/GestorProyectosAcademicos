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
            // Cambiar o agregar las columnas para almacenar múltiples archivos como JSON
            $table->json('file')->nullable()->change(); // Ruta de los archivos
            $table->json('original_file_name')->nullable()->change(); // Nombres originales de los archivos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->dropColumn('file');
            $table->dropColumn('original_file_name');
        });
    }
};
