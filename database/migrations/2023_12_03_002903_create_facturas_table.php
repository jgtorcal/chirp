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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->date('fecha');
            $table->text('conceptos');
            $table->decimal('iva', 5, 2);
            $table->decimal('irpf', 5, 2);
            $table->decimal('base_imponible', 10, 2);
            $table->decimal('importe_total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
