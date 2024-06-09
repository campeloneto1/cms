<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
     public function login(Request $request){
        $credenciais = request(['cpf', 'password']);

        if(!Auth::attempt($credenciais)){
            $erro = "Usuario nao autorizado!";
            $cod = 171;
            $resposta = ['erro' => $erro, 'cod' => $cod];
            return response()->json($resposta, 404);
        }

        $usuario = $request->user();

        DB::table('oauth_access_tokens')->where('revoked', 0)->where('user_id', $usuario->id)->update(['revoked' => 1]);
        
        $resposta['token'] = $usuario->createToken('token')->accessToken;
        $resposta['user'] = $usuario;

        return response()->json($resposta, 200);
    }
}
