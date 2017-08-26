<?php

namespace PhotoAlbum\Http\Controllers;

use Validator;
use PhotoAlbum\Image;
use Illuminate\Http\Request;
use PhotoAlbum\Http\Controllers\Controller;

class imageController extends Controller
{
    public function load(Request $request, $data = ""){
        return view('addImage', ['title'=>'Agregar Imagen', 'username'=>$request->session()->get('nickname'), 'description'=>$data]);
    }

    public function add(Request $request){
        $title = $request->input('title');
        $description = $request->input('description');
        $privacity = $request->input('privacity');
        $nickname = $request->session()->get('nickname');
        $image_data = array('title'=>$title, 'description'=>$description, 'privacity'=>$privacity);
        $image = new Image($image_data);
        $validator = Validator::make($image_data, [
            'title' => 'required'
        ]);
        if($validator->fails()){
            return redirect('imageController')->withErrors($validator);
        }elseif($image->exists($nickname)){
            return redirect('imageController')->withErrors(array('imageExists'=>'Ya tienes una imagen con ese nombre'));
        }else{           
            $image = new Image;
            $image->photo = 'photo';
            $image->description = 'desc';
            if($privacity == 'Privado'){
                $image->privacity = 1;
            }else{
                $image->privacity = 0;
            }
            $image->title = $title;
            $image->nickname = $nickname;
            $request->session()->push('image_data', $image);
            return redirect('showAlbums');
        }
    }
}
