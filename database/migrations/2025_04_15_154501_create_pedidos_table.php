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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->decimal('valor_total', 10, 2);
            $table->decimal('valor_desconto', 10, 2)->nullable();
            $table->enum('forma_pagamento', ['crédito', 'débito', 'pix', 'dinheiro']);
            $table->enum('status', ['Em Aberto', 'Aguardando Preparo', 'Em Preparo', 'Em Rota de Entrega', 'Entregue'])->default('Em Aberto');
            $table->timestamps(); // inclui created_at e updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
