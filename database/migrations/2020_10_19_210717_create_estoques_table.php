<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_livro');
            $table->foreignId('id_funcionario');
            $table->smallInteger('quant_total');
            $table->smallInteger('quant_recebida');
            $table->date('dataatualizacao');

            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('funcionarios');
            $table->foreign('id_livro')->references('id')->on('livros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoques');
    }
}
