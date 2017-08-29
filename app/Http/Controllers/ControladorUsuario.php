<?php

namespace PhotoAlbum\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use PhotoAlbum\Usuario;
use PhotoAlbum\Image;
use PhotoAlbum\comment;
use Illuminate\Support\Facades\Hash;

class ControladorUsuario extends Controller
{
    public function index(){
        return view('login', ['title' => 'Bienvenido']);
    }

    public function reset(Request $request){
        $request->session()->flush();
    }

    public function forbidden(){
        return view('not_found', ['title'=>'404 Página no encontrada']);
    }

    public function inicio(Request $request){
        $temp = new Image();
        $images = $temp->getAll();
        //echo $images;
        return view('start', ['title' => 'Inicio', 'nickname'=>$request->session()->get('nickname'), 'images'=>$images]);
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
            return redirect('/')->withErrors(array('nick'=>'El nickname ya existe'));
        }else{
            $user = new Usuario;
            $user->name = $name;
            $user->nickname = $nickname;
            $user->password = Hash::make($password);
            $user->save();
            $request->session()->put('nickname', $nickname);
            return redirect('inicio');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function comment(Request $request, $image_title, $nick){
        $comment = $request->input('comment');
        if($comment != null){
            $image = new Image();
            $temp = new comment;
            $id = $image->getId($nick, $image_title);
            $temp->comment = $comment;
            $temp->image_id = $id[0]->id;
            $temp->nickname = $request->session()->get('nickname');
            $temp->img_nick = $nick; $temp->save();
        }      
        return redirect('image/'.$nick.'/'.$image_title);
    }
}