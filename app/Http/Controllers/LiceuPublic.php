<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class LiceuPublic extends Controller
{

    public function index()
    {
        $habilita = DB::connection('liceu') ->table('habilita_inscricao')->select('habilita')->first();
        if($habilita->habilita == 1){
            
            return view('liceu.index');
        }
        else
            return view('liceu.encerrada');
        
        
        
        
    }
    public function cadastro($id)
    {

        $cursos = DB::connection('liceu')->table('cursos')->where('uuid', $id)->get();
        return view('liceu.inscricao', compact('cursos'));
    }

    public function cadastroSave(Request $request)
    {
        // dd($request);
        $hoje =  date('Y-m-d H:i:m');
        $uuid = md5($request->cpf . $request->nascimento);
        $validacao =   DB::connection('liceu')->table('inscricao')->where('cpf', $request->cpf)->where('curso',$request->uuid)->count();
        if($validacao > 0 ){
              $erro = 'Usuario já inscrito';
             return view('liceu.erro', compact('erro'));
        }
        $inscricao = DB::connection('liceu')->table('inscricao')->where('cpf', $request->cpf)->first();
        $cursos = DB::connection('liceu')->table('cursos')->where('uuid', $request->uuid)->first();
        if ($cursos != null) {

            // dd($inscricao);
            // if ($inscricao == null) {
                if ($cursos->vagas > 0) {
                    $tipo = 'Normal';
                  
                } else if ($cursos->vagas_reserva == 0) {
                    $erro = 'Não a vagas disponiveis';
                    return view('liceu.erro', compact('erro'));
                } else {
                    $tipo = 'Lista de Espera';
                    DB::connection('liceu')->table('cursos')->where('uuid', $request->uuid)->update(['vagas_reserva' =>  $cursos->vagas_reserva - 1]);
                }
                DB::connection('liceu')->table('inscricao')->insert([
                    'uuid' =>  $uuid,
                    'instrumento' =>  $request->instrumento,
                    'Nome' =>  $request->Nome,
                    'Nomesocial' =>  $request->Nomesocial,
                    'nascimento' =>  $request->nascimento,
                    'idade' =>  $request->idade,
                    'deficiancia' =>  $request->deficiancia,
                    'qual' =>  $request->qual,
                    'estadocivil' =>  $request->estadocivil,
                    'sexo' =>  $request->sexo,
                    'rg' =>  $request->rg,
                    'cpf' =>  $request->cpf,
                    'endereco' =>  $request->endereco,
                    'zona' =>  $request->zona,
                    'cidade' =>  $request->cidade,
                    'uf' =>  $request->uf,
                    'contato1' =>  $request->contato1,
                    'email' =>  $request->email,
                    'estuda' =>  $request->estuda,
                    'escola' =>  $request->escola,
                    'escolaridade' =>  $request->escolaridade,
                    'anoSementre' =>  $request->anoSementre,
                    'pai' =>  $request->pai,
                    'mae' =>  $request->mae,
                    'renda' =>  $request->renda,
                    'residencia' =>  $request->residencia,
                    'moradores' =>  $request->moradores,
                    'documento' =>  $request->documento,
                    'termos' =>  $request->termos,
                    'curso' =>  $request->uuid,
                    'tipoVga' =>  $tipo,
                    'created_at' => $hoje,
                    'updated_at' => $hoje
                ]);
                DB::connection('liceu')->table('cursos')->where('uuid', $request->uuid)->update(['vagas' =>  $cursos->vagas - 1]);

                if ($request->file != null) {
                    for ($i = 0; $i < sizeof($request->file); $i++) {
                        $request->file('file')[$i]->storeAs('documentacao/' . $uuid, $request->file[$i]->getClientOriginalName());
                    }
                }

                return redirect('/confirmacao/' . $uuid);
            // } else {
            //     $erro = 'Usuario já inscrito';
            //     return view('liceu.erro', compact('erro'));
            // }
        } else {
            $erro = 'Cursos não encontrado';
            return view('liceu.erro', compact('erro'));
        }
        // return view('liceu.inscricao');
    }
    public function confirmacao($uuid)
    {
        $inscricao = DB::connection('liceu')->table('inscricao')->where('uuid', $uuid)
            ->select('nome', 'tipoVga', 'curso', 'Nomesocial')->first();
        if ($inscricao == NULL) {
            abort(404);
        }
        $cursos = DB::connection('liceu')->table('cursos')->where('uuid',  $inscricao->curso)->first();
        return view('liceu.confirmacao', compact('inscricao', 'cursos'));
    }
    public function listarCurso()
    {
        $cursos = DB::connection('liceu')->table('cursos')->where('vagas', '>', 0)->select('unidade')->get();
        $cursos = $cursos->unique();
        return view("liceu.listaCursoStep1", compact('cursos'));
    }

    public function listarCursoStep2($unidade)
    {
        $cursos = DB::connection('liceu')->table('cursos')->where('vagas', '>', 0)->where('unidade', $unidade)->select('nucleo')->get();
        $cursos = $cursos->unique();
        return view("liceu.listaCursoStep2", compact('cursos','unidade'));
    }

    public function listarCursoStep3($unidade, $nucleo)
    {
        $cursos = DB::connection('liceu')->table('cursos')->where('vagas', '>', 0)->where('unidade', $unidade)->where('nucleo' , $nucleo)->select('curso')->get();
        $cursos = $cursos->unique();
        return view("liceu.listaCursoStep3", compact('cursos','unidade','nucleo'));
    }

    public function listarCursoStep4($unidade, $nucleo, $curso)
    {
        $cursos = DB::connection('liceu')->table('cursos')->where('vagas', '>', 0)->where('unidade', $unidade)->where('nucleo' , $nucleo)->where('curso', $curso)->get();
        return view("liceu.listaCursoStep4", compact('cursos','unidade','nucleo','curso'));
    }

    public function listarCursoPesquisa($id, Request $request)
    {
        // dd($request);
        if ($request->prompt == null) {
            return redirect('/selecionar-curso');
        }
        $cursos = DB::connection('liceu')->table('cursos')
            ->where('unidade', 'like', '%' . $request->prompt . '%')
            ->orwhere('nucleo', 'like', '%' . $request->prompt . '%')
            ->orwhere('curso', 'like', '%' . $request->prompt . '%')
            ->get();
        return view("liceu.listaCurso", compact('cursos'));
    }

    public function reimpressao()
    {
        return view('liceu.reimpressao');
    }
    public function reimpressaoSave(Request $request)
    {

        $uuid = md5($request->cpf . $request->nascimento);
        return redirect('/confirmacao/' . $uuid);
    }
    
}
