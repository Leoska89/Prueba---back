<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{   

    //funcion para loguear con email and password
    public function login(Request $request){
        
        $login = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($login)){
            return response(['message'=>'invalid loginnn']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user' => Auth::user(), 'token' => $accessToken]);
    }

    //funcion para loguear con token
    public function token(){
        return response(['user' => Auth::user(), 'token' => '']);
    }
    //funcion para traer los usuarios
    public function getusers(){
        $usuarios = DB::table('users')->get();
        return response(['users' => $usuarios]);
    }    
    
    //logOut
    public function logout(Request $request){        
        $request->user()->token()->revoke();
        $request->user()->token()->delete(); 
        return response(['user' => 'eliminado']);
    }

    public function registrar(Request $request){
        return User::create([
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],
            'tid' => $request['tid'],
            'numeroid' => $request['numeroid'],
            'roll' => $request['roll'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }
}
