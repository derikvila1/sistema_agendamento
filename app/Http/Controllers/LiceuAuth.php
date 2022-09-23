<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Controllers\permissionController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use PDF;

class LiceuAuth extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();

        $result = DB::connection('liceu') ->table('habilita_inscricao')->select('habilita')->first();

        if ($checkpermission == null) {
            abort(403);
        }
     
        return view("dashboard.index",compact('result'));
    }
    public function habilitar(){

        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        $result = DB::connection('liceu') ->table('habilita_inscricao')->select('habilita')->first();

        if($result->habilita == 1){
            
            DB::connection('liceu')->table('habilita_inscricao')->where('habilita',1)->update(['habilita'=>0]);
           
        }
        else
        DB::connection('liceu')->table('habilita_inscricao')->where('habilita',0)->update(['habilita'=>1]);
            
        return view("dashboard.index",compact ('result'));
        

    }
    // CURSOS
    public function cadastraCurso()
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        return view("liceu.painel.cadastraCurso");
    }

    public function cadastraCursoSave(Request $request)
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        $hoje =  date('Y-m-d H:i:m');
        $uuid = Str::uuid();
        $result = DB::connection('liceu')->table('cursos')->where('uuid', $uuid)->first();

        if ($result == NULL) {
            DB::connection('liceu')->table('cursos')->insert([
                'uuid' =>  $uuid,
                'unidade' => $request->unidade,
                'nucleo' => $request->nucleo,
                'curso' => $request->curso,
                'instrutor' => $request->instrutor,
                'dia' => json_encode($request->dia),
                'horario_inicial' => $request->horario_inicial,
                'horario_final' => $request->horario_final,
                'faixa_etaria_inicial' => $request->faixa_etaria_inicial,
                'faixa_etaria_final' => $request->faixa_etaria_final,
                'periodo_inicio' => $request->periodo_inicio,
                'periodo_fim' => $request->periodo_fim,
                'vagas' => $request->vagas,
                'vagas_reserva' => $request->vagas_reserva,
                'prerequisito' => $request->prerequisito,
                'created_at' => $hoje,
                'updated_at' => $hoje,
                'link' => $request->link
            ]);
            $msg_erro = "Curso Cadastrado Com Sucesso";
            return view("liceu.painel.cadastraCurso", compact('msg_erro'));
        } else {
            $msg_erro = "Curso Já Cadastrado";
            return view("liceu.painel.cadastraCurso", compact('msg_erro'));
        }
    }

    public function listarCurso(Request $request)
    {
        $cursos = [];
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        if ($checkpermission->permission == 701) {
            if (isset($request->type) && isset($request->prompt)) {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Sambódromo%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            } else {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'Sambódromo')->paginate(20);
            }
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 702) {
            if (isset($request->type) && isset($request->prompt)) {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Pedro Vignola%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            } else {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Pedro Vignola%')->paginate(20);
            }
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 703) {
            if (isset($request->type) && isset($request->prompt)) {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%magdalena%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            } else {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Magdalena%')->paginate(20);
            }
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 704) {
            if (isset($request->type) && isset($request->prompt)) {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Parintins%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            } else {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Parintins%')->paginate(20);
            }
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 705) {
            if (isset($request->type) && isset($request->prompt)) {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Envira%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            } else {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Envira%')->paginate(20);
            }
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }

        if ($checkpermission->permission == 706) {
            if (isset($request->type) && isset($request->prompt)) {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%digital%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            } else {
                $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%digital%')->paginate(20);
            }
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 710) {
            if (isset($request->type) && isset($request->prompt)) {
                $cursos = DB::connection('liceu')->table('cursos')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            } else {
                $cursos = DB::connection('liceu')->table('cursos')->paginate(20);
            }
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }

        return view("liceu.painel.listarCurso", compact('cursos'));
    }


    public function listarCursoPesquisa(Request $request)
    {

        $cursos = [];
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        if ($request->prompt == null) {
            return redirect('/curso/lista');
        }
        if ($checkpermission->permission == 701) {

            // $nucelo = DB::connection('liceu')->table('cursos')->where('nucleo', 'like', '%Sambódromo%')->where('nucleo', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($nucelo); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $nucelo[$i]->uuid)->count();
            //     $nucelo[$i]->inscritos =  $inscricao;
            // }
            // $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Sambódromo%')->where('curso', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($cursos); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
            //     $cursos[$i]->inscritos =  $inscricao;
            // }
            // $cursos = $cursos->merge($nucelo);
            // $cursos  = $cursos->unique();

            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Sambódromo%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 702) {

            // $nucelo = DB::connection('liceu')->table('cursos')->where('nucleo', 'like', '%Pedro Vignola%')->where('nucleo', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($nucelo); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $nucelo[$i]->uuid)->count();
            //     $nucelo[$i]->inscritos =  $inscricao;
            // }
            // $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Pedro Vignola%')->where('curso', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($cursos); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
            //     $cursos[$i]->inscritos =  $inscricao;
            // }
            // $cursos = $cursos->merge($nucelo);
            // $cursos  = $cursos->unique();

            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Pedro Vignola%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 703) {
            // $nucelo = DB::connection('liceu')->table('cursos')->where('nucleo', 'like', '%magdalena%')->where('nucleo', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($nucelo); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $nucelo[$i]->uuid)->count();
            //     $nucelo[$i]->inscritos =  $inscricao;
            // }
            // $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%magdalena%')->where('curso', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($cursos); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
            //     $cursos[$i]->inscritos =  $inscricao;
            // }
            // $cursos = $cursos->merge($nucelo);
            // $cursos  = $cursos->unique();

            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%magdalena%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 704) {

            // $nucelo = DB::connection('liceu')->table('cursos')->where('nucleo', 'like', '%Parintins%')->where('nucleo', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($nucelo); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $nucelo[$i]->uuid)->count();
            //     $nucelo[$i]->inscritos =  $inscricao;
            // }
            // $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Parintins%')->where('curso', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($cursos); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
            //     $cursos[$i]->inscritos =  $inscricao;
            // }
            // $cursos = $cursos->merge($nucelo);
            // $cursos  = $cursos->unique();

            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Parintins%')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 705) {

            // $nucelo = DB::connection('liceu')->table('cursos')->where('nucleo', 'like', '%Envira%')->where('nucleo', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($nucelo); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $nucelo[$i]->uuid)->count();
            //     $nucelo[$i]->inscritos =  $inscricao;
            // }
            // $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Envira%')->where('curso', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($cursos); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
            //     $cursos[$i]->inscritos =  $inscricao;
            // }
            // $cursos = $cursos->merge($nucelo);
            // $cursos  = $cursos->unique();

            $cursos = DB::connection('liceu')->table('cursos'->where('unidade', 'like', '%Envira%'))->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 710) {
            // $nucelo = DB::connection('liceu')->table('cursos')->where('nucleo', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($nucelo); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $nucelo[$i]->uuid)->count();
            //     $nucelo[$i]->inscritos =  $inscricao;
            // }
            // $cursos = DB::connection('liceu')->table('cursos')->where('curso', 'like', '%' . $request->prompt . '%')->get();
            // for ($i = 0; $i < count($cursos); $i++) {
            //     $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
            //     $cursos[$i]->inscritos =  $inscricao;
            // }
            // $cursos = $cursos->merge($nucelo)->unique();
            // $cursos  = $cursos->unique();
            $cursos = DB::connection('liceu')->table('cursos')->where($request->type, 'like', '%' . $request->prompt . '%')->paginate(20);
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }


        return view("liceu.painel.listarCurso", compact('cursos'));
    }

    public function deletaCurso($uuid)
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        DB::connection('liceu')->table('cursos')->where('uuid', $uuid)->delete();
        $cursos = DB::connection('liceu')->table('cursos')->get();
        $msg_erro = 'Curso Apagado';
        return view("liceu.painel.listarCurso", compact('cursos', 'msg_erro'));
    }

    public function visualisarCurso($uuid, Request $request)
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        $inscricao = DB::connection('liceu')->table('inscricao')
            ->where('curso', $uuid)
            ->get();


        if ($request->all() == null) {
            $cursos = DB::connection('liceu')->table('cursos')
                ->where('uuid', $uuid)
                ->first();
            return view("liceu.painel.visualisarCurso", compact('cursos', 'inscricao'));
        }
        $hoje =  date('Y-m-d H:i:m');

        DB::connection('liceu')->table('cursos')->where('uuid', $request->uuid)->update([
            'unidade' => $request->unidade,
            'nucleo' => $request->nucleo,
            'curso' => $request->curso,
            'instrutor' => $request->instrutor,
            'dia' => json_encode($request->dia),
            'horario_inicial' => $request->horario_inicial,
            'horario_final' => $request->horario_final,
            'faixa_etaria_inicial' => $request->faixa_etaria_inicial,
            'faixa_etaria_final' => $request->faixa_etaria_final,
            'periodo_inicio' => $request->periodo_inicio,
            'periodo_fim' => $request->periodo_fim,
            'vagas' => $request->vagas,
            'vagas_reserva' => $request->vagas_reserva,
            'prerequisito' => $request->prerequisito,
            'link' => $request->link,
            'updated_at' => $hoje
        ]);
        $msg_erro = 'Curso Atualizado com Sucesso';
        $cursos = DB::connection('liceu')->table('cursos')
            ->where('uuid', $uuid)
            ->first();
        return view("liceu.painel.visualisarCurso", compact('cursos', 'msg_erro', 'inscricao'));
    }


    // INSCRIÇAO

    public function listarInscricao()
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        if ($checkpermission->permission == 701) {
            $inscricao = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade')
                ->where('cursos.unidade', 'like',  '%Sambódromo%')
                ->get();
        }
        if ($checkpermission->permission == 702) {
            $inscricao = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade')
                ->where('unidade', 'like', '%Pedro Vignola%')
                ->get();
        }
        if ($checkpermission->permission == 703) {
            $inscricao = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade')
                ->where('cursos.unidade', 'like',  '%Magdalena%')
                ->get();
        }
        if ($checkpermission->permission == 704) {
            $inscricao = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade')
                ->where('cursos.unidade', 'like',  '%Parintins%')
                ->get();
        }
        if ($checkpermission->permission == 705) {
            $inscricao = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade')
                ->where('cursos.unidade', 'like',  '%Envira%')
                ->get();
        }
        if ($checkpermission->permission == 710) {
            $inscricao = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade')
                // ->where('cursos.unidade', 'like',  '%a%')
                ->get();
        }


        return view("liceu.painel.listarInscricao", compact('inscricao'));
    }

    public function visualisarInscricao($uuid, Request $request)
    {
        $documentos = [];
        $url = '';
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        if ($request->all() == null) {
            $inscricao = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade', 'cursos.horario_inicial', 'cursos.horario_final', 'cursos.dia', 'cursos.instrutor')
                ->where('inscricao.uuid', $uuid)
                ->first();
            $doc = storage_path('app/documentacao/' . $uuid);
            if (is_dir($doc)) {
                $documentos = scandir($doc);
            }


            return view("liceu.painel.visualisarInscricao", compact('inscricao', 'documentos', 'url'));
        }
        $hoje =  date('Y-m-d H:i:m');

        DB::connection('liceu')->table('inscricao')->where('uuid', $request->uuid)->update([
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
            'updated_at' => $hoje
        ]);
        $doc = storage_path('app/documentacao/' . $uuid);
        if (is_dir($doc)) {
            $documentos = scandir($doc);
        }
        $msg_erro = 'Inscrição Atualizado com Sucesso';
        $inscricao = DB::connection('liceu')->table('inscricao')
            ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
            ->select('inscricao.*', 'cursos.curso', 'cursos.curso', 'cursos.nucleo', 'cursos.unidade', 'cursos.horario_inicial', 'cursos.horario_final', 'cursos.dia', 'cursos.instrutor')
            ->where('inscricao.uuid', $uuid)
            ->first();
        return view("liceu.painel.visualisarInscricao", compact('inscricao', 'msg_erro', 'documentos', 'url'));
    }

    public function listarInscricaoPesquisa(Request $request)
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        if ($request->prompt == null) {
            return redirect('/inscricao/lista');
        }
        $inscricao = DB::connection('liceu')->table('inscricao')
            ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
            ->select('inscricao.*', 'cursos.curso', 'cursos.unidade', 'cursos.nucleo')
            ->where('cursos.unidade', 'like', '%' . $request->prompt . '%')
            ->orWhere('cursos.nucleo', 'like', '%' . $request->prompt . '%')
            ->orWhere('cursos.curso', 'like', '%' . $request->prompt . '%')
            ->orWhere('inscricao.Nome', 'like', '%' . $request->prompt . '%')
            ->orWhere('inscricao.cpf', 'like', '%' . $request->prompt . '%')
            ->get();
        return view("liceu.painel.listarinscricao", compact('inscricao'));
        return view("liceu.painel.listarinscricao", compact('inscricao'));
    }

    public function deletaInscrito($uuid)
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        $cursos =    DB::connection('liceu')->table('inscricao')->where('id', $uuid)->first();
        DB::connection('liceu')->table('inscricao')->where('uuid', $uuid)->delete();
        return redirect('curso/' . $cursos->curso);
    }


    public function imprimir($uuid)
    {

        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }


        $cursos = DB::connection('liceu')->table('cursos')
            ->where('uuid', $uuid)
            ->first();
        if ($cursos == null) {
            abort(404);
        }
        $inscricao = DB::connection('liceu')->table('inscricao')
            ->where('curso', $uuid)
            ->get();

        return view('liceu.painel.imprimir', compact('cursos', 'inscricao'));
    }


    public function relarorio()
    {

        $cursos = [];
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        if ($checkpermission->permission == 701) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'Sambódromo')->get();
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 702) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Pedro Vignola%')->get();
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 703) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Magdalena%')->get();
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 704) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Parintins%')->get();
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }
        if ($checkpermission->permission == 705) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Envira%')->get();
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }

        if ($checkpermission->permission == 706) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Digital%')->get();
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }

        if ($checkpermission->permission == 710) {
            $cursos = DB::connection('liceu')->table('cursos')->get();
            for ($i = 0; $i < count($cursos); $i++) {
                $inscricao = DB::connection('liceu')->table('inscricao')->where('curso', $cursos[$i]->uuid)->count();
                $cursos[$i]->inscritos =  $inscricao;
            }
        }


        return view('liceu.painel.relatorio', compact('cursos'));
    }

    public function arquivo($id, $arquivo)
    {

        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        $doc = storage_path('/app/documentacao/' . $id . '/' . $arquivo);
        $download = $doc;
        // dd( $doc);
        if (file_exists($download)) {
            return response()->download($download);
        } else {
            return 'Arquivo não encontrado';
        }
    }

    public function uploadDocumento(Request $request)
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }

        if ($request->perfil != null) {
            $request->file('perfil')->storeAs('documentacao/' . $request->uuid, $request->perfil->getClientOriginalName());
        }

        if ($request->frente != null) {
            $request->file('frente')->storeAs('documentacao/' . $request->uuid, $request->frente->getClientOriginalName());
        }

        if ($request->verso != null) {
            $request->file('verso')->storeAs('documentacao/' . $request->uuid, $request->verso->getClientOriginalName());
        }
        if ($request->outros != null) {
            $request->file('outros')->storeAs('documentacao/' . $request->uuid, $request->outros->getClientOriginalName());
        }

        return back();
    }

    public function deleteDocumento($uuid, $arquivo)
    {
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }


        if (file_exists(storage_path('/app/documentacao/' . $uuid . '/' . $arquivo))) {

            unlink(storage_path('/app/documentacao/' . $uuid . '/' . $arquivo));
            return back();
        }


        return back();
    }


    public function relatorioGerar()
    {
        $cursos = [];
        $unidades = [];
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        if ($checkpermission->permission == 701) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'Sambódromo')->get();
            $unidades = $cursos;
            $horarios = $cursos;
            $unidades =  $unidades->unique('unidade');
            $horarios =  $horarios->unique('horario_inicial');
            $cursos  = $cursos->unique('curso');
        }
        if ($checkpermission->permission == 702) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Pedro Vignola%')->get();
            $unidades = $cursos;
            $horarios = $cursos;
            $unidades =  $unidades->unique('unidade');
            $horarios =  $horarios->unique('horario_inicial');
            $cursos  = $cursos->unique('curso');
        }
        if ($checkpermission->permission == 703) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Magdalena%')->get();
            $unidades = $cursos;
            $horarios = $cursos;
            $unidades =  $unidades->unique('unidade');
            $horarios =  $horarios->unique('horario_inicial');
            $cursos  = $cursos->unique('curso');
        }
        if ($checkpermission->permission == 704) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Parintins%')->get();
            $unidades = $cursos;
            $horarios = $cursos;
            $unidades =  $unidades->unique('unidade');
            $horarios =  $horarios->unique('horario_inicial');
            $cursos  = $cursos->unique('curso');
        }
        if ($checkpermission->permission == 705) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Envira%')->get();
            $unidades = $cursos;
            $horarios = $cursos;
            $unidades =  $unidades->unique('unidade');
            $horarios =  $horarios->unique('horario_inicial');
            $cursos  = $cursos->unique('curso');
        }

        if ($checkpermission->permission == 706) {
            $cursos = DB::connection('liceu')->table('cursos')->where('unidade', 'like', '%Digital%')->get();
            $unidades = $cursos;
            $horarios = $cursos;
            $unidades =  $unidades->unique('unidade');
            $horarios =  $horarios->unique('horario_inicial');
            $cursos  = $cursos->unique('curso');
        }

        if ($checkpermission->permission == 710) {
            $cursos = DB::connection('liceu')->table('cursos')->orderBy('curso')->get();
            $unidades = $cursos;
            $horarios = $cursos;
            $unidades =  $unidades->unique('unidade');
            $horarios =  $horarios->unique('horario_inicial');
            $cursos  = $cursos->unique('curso');
        }


        return view('liceu.painel.relatorioGerar', compact('cursos', 'unidades','horarios'));
    }

    public function relarorioImprimir(Request $request)
    {

      
        $userid = auth()->user()->id;
        $checkpermission = DB::table('permitted_users')->select('permission')
            ->where('user', $userid)
            ->whereBetween('permission', [701, 710])
            ->get()->first();
        if ($checkpermission == null) {
            abort(403);
        }
        if ($request->tipo == 'unidade') {

            $request->validate([
                'unidade' => ['required']
            ]);
            $inscricoes = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.unidade', 'cursos.nucleo')
                ->where('cursos.unidade', 'like', '%' . $request->unidade . '%')
                ->select(
                    'cursos.unidade',
                    'cursos.curso',
                    'cursos.nucleo',
                    'cursos.horario_inicial',
                    'cursos.horario_final',
                    'cursos.periodo_inicio',
                    'cursos.periodo_fim',
                    'cursos.dia',
                    'cursos.instrutor',
                    'inscricao.Nome',
                    'inscricao.contato1',
                    'inscricao.mae',
                    'inscricao.pai',
                    'inscricao.cpf',
                    'inscricao.email',
                    'inscricao.idade'
                )
                ->get();
                
                // return $request->user()->downloadInvoice($inscricoes);
        }
        if ($request->tipo == 'curso') {
            $request->validate([
                'unidade' => ['required'],
                'curso' => ['required'],
                'horario' => ['required']
            ]);

            $inscricoes = DB::connection('liceu')->table('inscricao')
                ->join('cursos', 'cursos.uuid', '=', 'inscricao.curso')
                ->select('inscricao.*', 'cursos.curso', 'cursos.unidade', 'cursos.nucleo')
                ->where('cursos.unidade', 'like', '%' . $request->unidade . '%')
                ->where('cursos.curso', 'like', '%' . $request->curso . '%')
                ->select(
                    'cursos.unidade',
                    'cursos.curso',
                    'cursos.nucleo',
                    'cursos.horario_inicial',
                    'cursos.horario_final',
                    'cursos.periodo_inicio',
                    'cursos.periodo_fim',
                    'cursos.dia',
                    'cursos.instrutor',
                    'inscricao.Nome',
                    'inscricao.contato1',
                    'inscricao.mae',
                    'inscricao.pai',
                    'inscricao.cpf',
                    'inscricao.email',
                    'inscricao.idade'
                )
                ->get();
        }
        // view()->share('liceu.painel.imprimirRelatorio',compact('inscricoes'));
        // $pdf = PDF::loadView('liceu.painel.imprimirRelatorio', $inscricoes);

      
        // return $pdf->download('pdf_file.pdf');
        // return view('liceu.painel.imprimirRelatorio', compact('inscricoes'));

        return PDF::loadView('liceu.painel.imprimirRelatorio', compact('inscricoes'))->setPaper('a4', 'landscape')->download('relatorio.pdf');
     
         
    }
}