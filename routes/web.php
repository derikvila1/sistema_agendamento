<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LiceuAuth;
use App\Http\Controllers\LiceuPublic;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SSOController;
use Carbon\Carbon;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [LiceuAuth::class, 'index']);
Route::post('/dashboard', [LiceuAuth::class, 'habilitar']);
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/create',                           [UserController::class, 'create']);
// Route::post('/users/create',                           [UserController::class, 'store']);
// Route::get('/users/show',                           [UserController::class, 'show']);
// Route::post('/users/show',                           [UserController::class, 'show']);

// Gerenciamento de usuários - SSOUsuariosController
// Route::get('/usuarios',                                 [UserController::class, 'inicio']);
// Route::get('/usuarios/editar/{id}',                     [UserController::class, 'usuarios_editar']);
// Route::post('/usuarios/editar/{id}',                    [UserController::class, 'usuarios_editar_post']);
// Route::post('/usuarios/editar/{id}/delete',             [UserController::class, 'usuarios_editar_excluir']);
// Route::post('/usuarios/editar/{id}/delete/{permission}',[UserController::class, 'usuarios_editar_remover_permissao']);
// Route::post('/usuarios/editar/{id}/add',                [UserController::class, 'usuarios_editar_adicionar_permissao']);
//Route::get('/usuarios/criar',                           [UserController::class, 'usuarios_criar']);
//Route::post('/usuarios/criar',                          [UserController::class, 'usuarios_criar_post']);
//


// Inscrições

Route::get('/curso/relatorio', [LiceuAuth::class, 'relarorio']);


Route::get('/curso', [LiceuAuth::class, 'cadastraCurso']);
Route::post('/curso', [LiceuAuth::class, 'cadastraCursoSave']);
Route::get('/curso/lista/', [LiceuAuth::class, 'listarCurso']);
Route::get('/curso/lista/{uuid}', [LiceuAuth::class, 'deletaCurso']);
Route::post('/curso/lista/', [LiceuAuth::class, 'listarCursoPesquisa']);
Route::get('/curso/{uuid}', [LiceuAuth::class, 'visualisarCurso']);
Route::post('/curso/{uuid}', [LiceuAuth::class, 'visualisarCurso']);

Route::get('/imprimir/{uuid}', [LiceuAuth::class, 'imprimir']);
Route::post('/upload/documentacao', [LiceuAuth::class, 'uploadDocumento']);

Route::get('/inscricao/lista/', [LiceuAuth::class, 'listarInscricao']);
Route::post('/inscricao/lista/', [LiceuAuth::class, 'listarInscricaoPesquisa']);
Route::get('/inscricao/{uuid}', [LiceuAuth::class, 'visualisarInscricao']);
Route::post('/inscricao/{uuid}', [LiceuAuth::class, 'visualisarInscricao']);
Route::get('/inscricao/deletar/{uuid}', [LiceuAuth::class, 'deletaInscrito']);


Route::get('/relatorio/gerar', [LiceuAuth::class, 'relatorioGerar']);
// Route::post('/relatorio/imprimir', array('as'=> 'generate.invoice.pdf', 'uses' => [LiceuAuth::class, 'relarorioImprimir']));
Route::post('/relatorio/imprimir', [LiceuAuth::class, 'relarorioImprimir']);
 



Route::get('/deletar/{uuid}/{arquivo}', [LiceuAuth::class, 'deleteDocumento']);
Route::get('/baixar/{id}/{arquivo}', [LiceuAuth::class, 'arquivo']);






Route::get('/', [LiceuPublic::class, 'index']);
// $hoje =  date('Y-m-d H:i:m');
// $abrir =  date('Y-m-d H:i:m', strtotime("2022-04-27 09:00:00"));
// $fechar =  date('Y-m-d H:i:m', strtotime("2022-30-05 23:59:59"));
// if ($hoje >= $abrir &&  $hoje <= $fechar) {

Route::get('/confirmacao/{uuid}', [LiceuPublic::class, 'confirmacao']);
Route::get('/inscrever-se', [LiceuPublic::class, 'cadastro']);
Route::get('/inscrever-se/{id}', [LiceuPublic::class, 'cadastro']);
Route::post('/inscrever-se/salvar', [LiceuPublic::class, 'cadastroSave']);
Route::get('/selecionar-curso', [LiceuPublic::class, 'listarCurso']);
Route::get('/selecionar-curso/{unidade}', [LiceuPublic::class, 'listarCursoStep2']);
Route::get('/selecionar-curso/{unidade}/{nucleo}', [LiceuPublic::class, 'listarCursoStep3']);
Route::get('/selecionar-curso/{unidade}/{nucleo}/{curso}', [LiceuPublic::class, 'listarCursoStep4']);
Route::post('/selecionar-curso/{id}', [LiceuPublic::class, 'listarCursoPesquisa']);
// }
Route::get('/reimpressao', [LiceuPublic::class, 'reimpressao']);
Route::post('/reimpressao', [LiceuPublic::class, 'reimpressaoSave']);

// Route::get('/api/curso', [ApiController::class, 'curso']);
// Route::get('/api/horario', [ApiControllers::class, 'horario']);


    ///apagar

    // Route::get('/inscrever-se/teste/{id}', [LiceuPublic::class, 'cadastroOld']);
    // Route::get('/selecionar-curso/teste', [LiceuPublic::class, 'listarCursoOld']);
    // Route::post('/selecionar-curso/teste', [LiceuPublic::class, 'listarCursoPesquisaOld']);
