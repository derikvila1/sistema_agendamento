<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\GrantedPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }

        $users = User::select('id', 'uuid', 'name', 'document')->paginate(100);
        $message = session()->get('message');
        return view("dashboard.users", compact('message', 'users'));
    }

    public function show($id, Request $request)
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }

        $request->validate([
            'uuid' => 'required|max:36',
        ]);

        $user = User::where('uuid', $request->uuid)->first();
        $user_permissions = GrantedPermission::join('permissions', 'granted_permissions.permission', '=', 'permissions.id')->join('applications', 'permissions.application', '=', 'applications.id')->select('applications.name', 'permissions.id', 'permissions.description', 'grant_date', 'granted_by')->where('user', $user->uuid)->get();
        $permissions = Application::join('permissions', 'applications.id', '=', 'permissions.application')->get();
        $message = session()->get('message');
        return view("dashboard.users_show", compact('message', 'user', 'user_permissions', 'permissions'));
    }

    public function usuarios_editar_post($id, Request $request)
    {
        if (PermissionController::checkPermission(101)) {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'document' => 'required|max:14',
            ]);

            if ($request->document != User::where('id', $id)->first()->document) {
                if (User::where('document', $request->document)->first()) {
                    return back()->withErrors('Já existe um usuário com o documento fornecido');
                }
            }

            if ($request->password && $request->password_confirm) {
                $request->validate([
                    'password' => 'min:8|max:32',
                    'password_confirm' => 'min:8|max:32',
                ]);
            }

            if ($request->password != $request->password_confirm) {
                return back()->withErrors('Confirmação de senha incorreta');
            }

            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'document' => $request->document,
                'password' => bcrypt($request->password),
            ]);
            session()->flash('message', "Cadastro de usuário alterado com sucesso.");
            return back();
        } else {
            return redirect('/');
        }
    }

    public function usuarios_editar_remover_permissao($id, $permission)
    {
        if (SSO::checkPermission(101)) {
            PermittedUsers::where('permission', $permission)->where('user', $id)->delete();
            session()->flash('message', "Permissão removida com sucesso.");
            return back();
        } else {
            return redirect('/');
        }
    }

    public function usuarios_editar_adicionar_permissao($id, Request $request)
    {
        if (SSO::checkPermission(101)) {
            foreach ($request->permissoes as $permissao) {
                PermittedUsers::create([
                    'user' => $id,
                    'permission' => $permissao,
                    'granted_date' => now(),
                    'granted_by' => auth()->user()->id,
                ]);
            }
            session()->flash('message', "Permissão adicionada com sucesso.");
            return back();
        } else {
            return redirect('/');
        }
    }

    public function usuarios_editar_excluir($id)
    {
        if (SSO::checkPermission(101)) {
            PermittedUsers::where('user', $id)->delete();
            User::where('id', $id)->delete();
            session()->flash('message', "Usuário removido com sucesso.");
            return redirect('/usuarios');
        } else {
            return redirect('/');
        }
    }

    public function create()
    {
        if (!PermissionController::checkPermission(101)) {
            abort(403);
        }
        $message = session()->get('message');
        $permissoes = Application::join('permissions', 'applications.id', '=', 'permissions.application')->get();
        return view("dashboard.users_create", compact('message', 'permissoes'));
    }

    public function store(Request $request)
    {
        if(!PermissionController::checkPermission(101)){
            abort(403);
        }
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'document' => 'required|max:14',
                'password' => 'required|min:8|max:32',
                'password_confirm' => 'required|min:8|max:32',
            ]);

            if (User::where('document', $request->document)->first()) {
                return back()->withErrors('Já existe um usuário com o documento fornecido');
            }

            if ($request->password != $request->password_confirm) {
                return back()->withErrors('Confirmação de senha incorreta');
            }

            $user = User::create([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'document' => $request->document,
                'password' => bcrypt($request->password),
                'created_by' => auth()->user()->id,
            ]);

            if ($request->permissoes != null) {
                foreach ($request->permissoes as $permission) {
                    PermittedUsers::create([
                        'user' => $user->id,
                        'permission' => $permission,
                        'granted_date' => now(),
                        'granted_by' => auth()->user()->id,
                    ]);
                }
            }

            session()->flash('message', "Usuário cadastrado com sucesso.");
            return redirect('/users');
    }
}
