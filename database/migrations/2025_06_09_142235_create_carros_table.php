<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id('id_carro');
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

            $table->foreign('id_compra')->references('id_compra')->on('compra')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carro');
    }
}
