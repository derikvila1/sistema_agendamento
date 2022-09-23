<?php

namespace App\Http\Controllers;

use App\Models\GrantedPermission;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Verifica se o usuário possui permissão
    public static function checkPermission($permission)
    {
        $user = auth()->user()->uuid;
        if (GrantedPermission::where('user', $user)->where('permission', $permission)->first()) {
            return true;
        } else {
            return false;
        }
    }

    // Adiciona uma nova permissão ao usuário atual
    public static function grantPermission($permission)
    {
        if(!PermissionController::checkPermission(101)){
            abort(403);
        }
        $user = auth()->user()->uuid;
        if (!GrantedPermission::where('user', $user)->where('permission', $permission)->first()) {
            GrantedPermission::insert(
                [
                    'user' => $user,
                    'permission' => $permission,
                    'grant_date' => now(),
                    'granted_by' => $user,
                ]
            );
        }
    }

    // Adiciona uma nova permissão ao usuário designado
    public static function grantPermissionToUser($permission, $user)
    {
        if(!PermissionController::checkPermission(101)){
            abort(403);
        }
        if (!GrantedPermission::where('user', $user)->where('permission', $permission)->first()) {
            GrantedPermission::insert(
                [
                    'user' => $user,
                    'permission' => $permission,
                    'grant_date' => now(),
                    'granted_by' => auth()->user()->uuid,
                ]
            );
        }
    }
}
