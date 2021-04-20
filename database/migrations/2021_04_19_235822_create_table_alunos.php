<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAlunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->integer('codigo');
            $table->boolean('situacao');

            $table->integer('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('bairro');
            $table->string('numero');
            $table->string('complemento');

            $table->string('curso');
            $table->string('turma');
            $table->date('data_matricula');
            $table->string('imagem')->default('user.png');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_alunos');
    }
}
