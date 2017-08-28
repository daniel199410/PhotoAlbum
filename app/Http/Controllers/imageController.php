<?php

namespace PhotoAlbum\Http\Controllers;

use Validator;
use PhotoAlbum\Image;
use PhotoAlbum\comment;
use PhotoAlbum\imagexalbum;
use Illuminate\Http\Request;
use PhotoAlbum\Http\Controllers\Controller;

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
            if($privacity == 'Privado'){
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
        return view('image', ['title'=>$image_title, 'nickname'=>$nick, 'image'=>$image, 'comments'=>$comments]);
    }
}
