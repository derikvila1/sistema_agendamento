<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    
    public function curso(Request $request){
        
        $request->validate([
            'u' => 'required',
        ]);

        $cursos = DB::connection('liceu')
        ->table('cursos')
        ->where('unidade',$request->u )
        ->select('unidade','curso','horario_inicial')
        ->orderBy('curso')
        ->get();
   
        return json_encode($cursos, JSON_UNESCAPED_UNICODE) ;
    }

    public function horario(Request $request){
        
        $request->validate([
            'u' => 'required',
            'c' => 'required',
        ]);

        $cursos = DB::connection('liceu')
                    ->table('cursos')
                    ->where('unidade',$request->u )
                    ->where('curso',$request->c )
                    ->select('unidade','curso','horario_inicial')
                    ->orderBy('horario_inicial')
                    ->get();

                    $cursos =  $cursos->unique('cursos');

        return json_encode($cursos, JSON_UNESCAPED_UNICODE) ;
    }
}
