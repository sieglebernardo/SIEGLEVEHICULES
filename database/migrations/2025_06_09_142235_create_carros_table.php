<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id('id_carro');
            // Chave estrangeira id_compra, com o mesmo tipo da chave primária em 'compras'
            $table->unsignedBigInteger('id_compra'); 
            $table->string('marca');
            $table->string('modelo');
            $table->year('ano');
            $table->string('cor');
            $table->string('placa')->unique();
            $table->decimal('preco', 10, 2);
            $table->enum('status', ['Disponível', 'Vendido', 'Indisponível']);
            $table->integer('kilometragem');
            $table->string('renavam')->unique();
            $table->string('tipo_combustivel');
            $table->timestamps();

            // CORRIGIDO: Referencia a tabela 'compras' (plural)
            $table->foreign('id_compra')->references('id_compra')->on('compras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // CORRIGIDO: Dropa a tabela 'carros' (plural)
        Schema::dropIfExists('carros');
    }
}