<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('area_x_games', function (Blueprint $table) {
        $table->id();
        
        // Relación con business_days (mejor nombre para el campo)
        $table->foreignId('business_day_id')
              ->constrained('business_days')
              ->onDelete('cascade')
              ->comment('Referencia al día de negocio');
              
        // Relación con areas (mejor nombre para el campo)
        $table->foreignId('area_id')
              ->constrained('areas')
              ->onDelete('cascade')
              ->comment('Referencia al área');
        
        // Copia del costo por persona al momento de creación
        $table->decimal('cost_per_person', 8, 2)
              ->default(0.00)
              ->comment('Costo por persona (copia del área)');
        
        // Copia de la capacidad al momento de creación
        $table->integer('max_capacity')
              ->default(0)
              ->comment('Capacidad máxima (copia del área)');
        
        // Lugares reservados
        $table->integer('reserved_quantity')
              ->default(0)
              ->comment('Cantidad de lugares reservados');
        
        $table->timestamps();
        
        // Índice único para evitar duplicados
        $table->unique(['business_day_id', 'area_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_x_games');
    }
};
