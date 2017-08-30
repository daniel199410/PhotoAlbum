<?php

namespace PhotoAlbum\Http\Controllers;

use Validator;
use PhotoAlbum\Image;
use PhotoAlbum\comment;
use PhotoAlbum\imagexalbum;
use Illuminate\Http\Request;
use PhotoAlbum\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class imageController extends Controller
{
    public function load(Request $request, $data = ""){
        return view('addImage', ['title'=>'Agregar Imagen', 'nickname'=>$request->session()->get('nickname'), 'description'=>$data]);
    }

    public function add(Request $request){
        $title = $request->input('title');
        $description = $request->input('description');
        $privacity = $request->input('privacity');
        $nickname = $request->session()->get('nickname');
        $image_data = array('title'=>$title, 'description'=>$description, 'privacity'=>$privacity);
        $image = new Image($image_data);
        $validator = Validator::make($image_data, [
            'title' => 'required',
        ]);
        if($validator->fails()){
            return redirect('imageController')->withErrors($validator);
        }elseif($image->exists($nickname)){
            return redirect('imageController')->withErrors(array('imageExists'=>'Ya tienes una imagen con ese nombre'));
        }else{           
            $image = new Image;
            if($privacity == 'Privada'){
                $image->privacity = 1;
            }else{
                $image->privacity = 0;
            }
            $image->description = $description;
            $image->title = $title;
            $image->nickname = $nickname;
            $image->photo = $request->file('image');
            $request->session()->push('image_data', $image);
            return redirect('showAlbums');
        }
    }

    public function listing(Request $request, $album){
        $nickname = $request->session()->get('nickname');
        $imageBuilder = new imagexalbum();
        $images = $imageBuilder->getImages($album, $nickname);
        return view('showImages', ['title'=>"Album ".$album, 'nickname'=>$nickname, 'images'=>$images, 'album'=>$album]);
    }

    public function show(Request $request, $nick, $image_title){
        $temp = new Image(['title'=>$image_title]);
        $nickname = $request->session()->get('nickname');
        $image = $temp->get($nick);
        $comment = new Comment();
        $comments = $comment->get($image_title, $nick);
        return view('image', ['title'=>$image_title, 'nickname'=>$nickname, 'image'=>$image, 'comments'=>$comments]);
    }

    public function formEdit(Request $request, $image_title){
        $nickname = $request->session()->get('nickname');
        $image = new Image(['title'=>$image_title]);
        $image = $image->get($nickname);
        return view('edit_image', ['title'=>'Editar la imagen '.$image_title, 'nickname'=>$nickname, 'image'=>$image]);
    }

    public function edit(Request $request, $original_title){
        $title = $request->input('title');
        $nickname = $request->session()->get('nickname');
        $description = $request->input('description');
        $privacity = $request->input('privacity');
        $image_data = array('title'=>$title, 'description'=>$description, 'privacity'=> $privacity, 'photo'=>'');
        $image = new Image($image_data);
        $validator = Validator::make($image_data, [
            'title' => 'required',
            'privacity' => 'required'
        ]);
        $temp = new Image(['title'=>$original_title]);
        $original_image = $temp->get($nickname);
        if($validator->fails()){
            return redirect('editImageForm/'.$original_title)->withErrors($validator);
        }elseif($image->exists($nickname) && $original_title != $title){
            return redirect('editImageForm/'.$original_title)->withErrors(array('imageExists'=>'Ya tienes una imagen con ese nombre'));
        }else{
            $extension = File::extension($original_title);
            if($original_title == $title){
                $temp_title = $title;
            }elseif($original_title == $title.'.'.$extension){
                $temp_title = $original_title;
            }else{
                $temp_title = $title.'.'.$extension;
                Storage::move($nickname.'/'.$original_title, $nickname.'/'.$temp_title);
            }           
            $priv = $privacity == 'Privado' ? 1 : 0;
            $image_data = array(
                'title'=>$temp_title, 
                'description'=>$description, 
                'privacity'=> $priv, 
                'photo'=>$nickname.'/'.$temp_title);
            $image = new Image($image_data);         
            $image->edit($nickname, $original_title);
            return redirect('image/'.$nickname.'/'.$temp_title);
        }
    }
}