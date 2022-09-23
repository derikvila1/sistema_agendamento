<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class Liceu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('liceu')->table('cursos')->insert([
            'id' => 1,
            'uuid' =>  md5('1artes visuais'),
            'unidade' => 'sambódromo',
            'nucleo' => 'artes visuais',
            'curso' => 'desenho 1',
            'instrutor' => 'samanta karla',
            'dia' => '{["terça","quinta"]}',
            'horario_inicial' => '14',
            'horario_final' => '17',
            'faixa_etaria_inicial' => '13',
            'faixa_etaria_final' => '59',
            'periodo_inicio' => 'março',
            'periodo_fim' => 'deezmbro',
            'vagas' => '7',
            'vagas_reserva' => '5',
            'prerequisito' => null,
            'link'=> ''

        ]);
    }
}
