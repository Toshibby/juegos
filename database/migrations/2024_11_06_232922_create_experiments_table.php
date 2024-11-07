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
        Schema::create('experiments', function (Blueprint $table) {
            $table->id();
            // $table->integer('n'); // Número de intentos
            // $table->float('p'); // Probabilidad de éxito en un intento
            // $table->integer('k'); // Número de éxitos deseados
            // $table->float('probability'); // Probabilidad calculada (P(X = k))
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiments');
    }
};
