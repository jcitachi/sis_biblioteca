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
        Schema::create('estudents', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();     // código del estudiante
            $table->string('dni', 20)->unique();        // dni, también único
            $table->string('nombres', 150);
            $table->string('apellidos', 150);
            $table->string('carrera', 255);
            $table->text('direccion');
            $table->string('telefono', 15);
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
