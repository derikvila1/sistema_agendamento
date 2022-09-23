<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('liceu')->create('inscricao', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('instrumento');
            $table->string('Nome');
            $table->string('Nomesocial')->nullable();
            $table->date('nascimento');
            $table->bigInteger('idade');
            $table->string('deficiancia')->nullable();
            $table->string('qual')->nullable();
            $table->string('estadocivil')->nullable();
            $table->string('sexo')->nullable();
            $table->bigInteger('rg');
            $table->bigInteger('cpf')->unique();
            $table->string('endereco');
            $table->string('zona')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->bigInteger('contato1');
            $table->string('email');
            $table->string('estuda')->nullable();
            $table->string('escola')->nullable();
            $table->string('escolaridade')->nullable();
            $table->bigInteger('anoSementre')->nullable();
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('renda')->nullable();
            $table->string('residencia')->nullable();
            $table->string('moradores')->nullable();
            $table->string('documento')->nullable();
            $table->string('termos');
            $table->string('curso');
            $table->string('tipoVga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('liceu')->dropIfExists('inscricao');
    }
};
