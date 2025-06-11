<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id('id_venda');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_vendedor');
            $table->unsignedBigInteger('id_carro');
            $table->date('data_venda');
            $table->decimal('valor_pago', 10, 2);
            $table->string('forma_pagamento');
            $table->text('observacoes')->nullable();
            $table->decimal('desconto', 10, 2)->default(0);
            $table->integer('garantia_meses')->default(0);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_vendedor')->references('id_vendedor')->on('vendedores')->onDelete('cascade');
            $table->foreign('id_carro')->references('id_carro')->on('carros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
