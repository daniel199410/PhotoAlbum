<?php

namespace PhotoAlbum\Http\Controllers;

use Illuminate\Http\Request;
use PhotoAlbum\Usuario;

class ControladorUsuario extends Controller
{
    public function index(){
        return view('login', ['title' => 'Bienvenido']);
    }

    public function login(){
        $username = $request->input('username');
        $password = $request->input('password');       
    }

    public function hola(){
        return "Hola";
    }

    public function register(Request $request){             
        $nickname = $request->input('r_nickname');
        $password = encrypt($request->input('r_password')); 
        $name = $request->input('r_name');
        $user_data = array(
            'nickname' => $nickname,
            'password' => $password,
            'name' => $name
        );  
        $usuario = new Usuario($user_data);
        if($usuario->register()){
            return "Usuario insertado";
        }
    }
}
