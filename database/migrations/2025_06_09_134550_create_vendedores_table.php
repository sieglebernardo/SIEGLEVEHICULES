<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id('id_vendedor');
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->date('data_contratacao');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
