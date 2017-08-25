<?php

namespace PhotoAlbum\Http\Controllers;

use PhotoAlbum\Album;
use Validator;
use Illuminate\Http\Request;

class albumController extends Controller
{
    public function load(){
        return view('crearAlbum', ['title'=>'Crear album']);
    }

    public function create(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $nickname = $request->session()->get('nickname');
        $album_data = array('name'=>$name, 'description'=>$description, 'nickname'=>$nickname);
        $album = new Album($album_data);
        $validator = Validator::make($album_data, [
            'name' => 'required',
            'nickname' => 'required'
        ]);
        if($validator->fails()){
            return redirect('albumController')->withErrors($validator);
        }elseif($album->exists($nickname)){
            return redirect('albumController')->withErrors(array('albumExists'=>'Ya existe un album con ese nombre'));
        }else{
            $album->name = $name;
            $album->description = $description;
            $album->nickname = $nickname;
            $album->save();
            return "Registrado";
        }
    }
}
