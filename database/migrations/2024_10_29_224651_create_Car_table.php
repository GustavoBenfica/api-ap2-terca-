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
        Schema::create('Car', function (Blueprint $table) {
            $table->id();
            $table->int('quilometragem');
            $table->string('modelo', 50);
            $table->string('placa',10);
            $table->string('marca',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Car');
    }
};
