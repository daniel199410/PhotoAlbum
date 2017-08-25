<?php

namespace PhotoAlbum\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use PhotoAlbum\Usuario;
use Illuminate\Support\Facades\Hash;

class ControladorUsuario extends Controller
{
    public function index(){
        return view('login', ['title' => 'Bienvenido']);
    }

    public function inicio(Request $request){
        return view('start', ['title' => 'Inicio', 'username'=>$request->session()->get('nickname')]);
    }

    public function login(Request $request){
        $nickname = $request->input('nickname');
        $password = $request->input('password');
        $usuario = new Usuario(array('nickname' => $nickname, 'password' => $password));
        if($usuario->exists()){
            $request->session()->put('nickname', $nickname);
            return redirect('inicio');
        }else{
            return redirect('/')->withErrors(array('wrongAuth'=>'Datos incorrectos'));           
        }
    }

    public function register(Request $request){
        $name = $request->input('r_name');
        $nickname = $request->input('r_nickname');
        $password = $request->input('r_password');
        $user_data = array('name' => $name,'password' => encrypt($password),'nickname' => $nickname);
        $usuario = new usuario($user_data);
        $validator = Validator::make($user_data, [
            'password' => 'required',
            'name' => 'required',
            'nickname' => 'required'
        ]);
        if($validator->fails()){
            return redirect('/')->withErrors($validator);
        }elseif($usuario->existeNick()){
            return redirect('login')->withErrors(array('nick'=>'El nickname ya existe'));
        }else{
            $user = new Usuario;
            $user->name = $name;
            $user->nickname = $nickname;
            $user->password = Hash::make($password);
            $user->save();
            return "Registrado";
        }
    }
}