<?php

namespace PhotoAlbum\Http\Controllers;

use PhotoAlbum\Album;
use PhotoAlbum\Image;
use PhotoAlbum\imagexalbum;
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
        $privacity = $request->input('privacity');
        $album_data = array('name'=>$name, 'description'=>$description, 'privacity'=>$privacity, 'nickname'=>$nickname);
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
            if($privacity == 'Privado'){
                $album->privacity = 1;
            }else{
                $album->privacity = 0;
            }
            $album->save();
            return "Registrado";
        }
    }

    public function showAlbum(Request $request){
        $image_data = $request->session()->get('image_data');
        $nickname = $request->session()->get('nickname');
        $album = new Album();
        $albumes = $album->get($nickname);
        return view('album_list', ['nickname'=>$request->session()->get('nickname'), 'albumes'=>$albumes, 'title'=>'Tus albumes']);
    }

    public function addImage(Request $request){
        $albumes = $request->input('albums');
        $image_data = $request->session()->get('image_data');
        if(empty($image_data[0])){
            return view('not_found', ['title'=> '404: Página no encontrada']);
        }else{
            $image = $image_data[0];
        }      
        $image->save();
        if(count($albumes) > 0){
            foreach($albumes as $album):
                $imageBuilder = new imagexalbum();
                $contador =  $imageBuilder->countImages($album, $image->nickname) + 1;
                $temp = new imagexalbum;
                $temp->order_number = $contador;
                $temp->album_name = $album;
                $temp->image_title = $image->title;
                $temp->nickname = $image->nickname;
                $temp->save();               
            endforeach;
            $request->session()->forget('image_data');
            return "Registrado";
        }
    }
}
