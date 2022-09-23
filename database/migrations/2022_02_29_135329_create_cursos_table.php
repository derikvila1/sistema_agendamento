<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
   
        Schema::connection('liceu')->create('cursos', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('unidade');
            $table->string('nucleo');
            $table->string('curso');
            $table->string('instrutor');
            $table->longText('dia');
            $table->string('horario_inicial');
            $table->string('horario_final');
            $table->string('faixa_etaria_inicial');
            $table->string('faixa_etaria_final');
            $table->string('periodo_inicio');
            $table->string('periodo_fim');
            $table->string('vagas');
            $table->string('vagas_reserva');
            $table->string('prerequisito')->nullable();
            $table->string('link');
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
        Schema::connection('liceu')->dropIfExists('cursos');
    }
};
