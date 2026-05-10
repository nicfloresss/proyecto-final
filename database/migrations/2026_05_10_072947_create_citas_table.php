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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')
              ->constrained('users')
              ->onDelete('cascade');
        $table->foreignId('manicurista_id')
              ->constrained('users')
              ->onDelete('cascade');
        $table->foreignId('servicio_id')
              ->constrained('servicios')
              ->onDelete('cascade');
        $table->date('fecha');
        $table->time('hora');
        $table->enum('estado', [
            'pendiente',
            'confirmada',
            'terminada'
        ])->default('pendiente');
        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
