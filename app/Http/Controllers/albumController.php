<?php

namespace PhotoAlbum\Http\Controllers;

use PhotoAlbum\Album;
use PhotoAlbum\Usuario;
use PhotoAlbum\Image;
use PhotoAlbum\imagexalbum;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class albumController extends Controller
{
    public function load(Request $request){
        $type = $request->session()->get('type');
        return view('crearAlbum', ['title'=>'Crear album', 'nickname'=>$request->session()->get('nickname'), 'type'=>$type]);
    }

    public function create(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $nickname = $request->session()->get('nickname');
        $privacy = $request->input('privacy');
        $album_data = array('name'=>$name, 'description'=>$description, 'privacy'=>$privacy, 'nickname'=>$nickname);
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
            if($privacy == 'Privado'){
                $album->privacy = 1;
            }else{
                $album->privacy = 0;
            }
            $album->save();
            return redirect('albums');
        }
    }

    public function edit(Request $request, $album){
        $nickname = $request->session()->get('nickname');
        $type = $request->session()->get("type");
        $temp = new Album(['name'=>$album]);
        $album_data = $temp->album($nickname);
        return view('edit_album_form', ['title'=>'Edición del album '.$album, 'nickname'=>$nickname, 'album'=>$album_data[0], 'type'=>$type]);
    }

    public function listing(Request $request){
        $album = new Album();
        $nickname = $request->session()->get('nickname');
        $type = $request->session()->get("type");
        $usuario = new Usuario(['nickname'=>$nickname]);        
        $albums = $album->get($nickname);
        return view('album_list_link', ['title'=>'Mis albumes', 'nickname'=>$nickname, 'albums'=>$albums, 'type'=>$type]);
    }

    public function listingByType(Request $request){
        $album = new Album();
        $nickname = $request->session()->get('nickname');
        $type = $request->session()->get("type");
        if($type == "Admin"){
            $albums = $album->getAll();
        }elseif($type == "Pro" || $type == "Regular"){
            $albums = $album->getIf($type);
        }else{
            return view("not_found", ['title'=>'Página no encontrada']);
        }
        return view('album_list_link_shared', ['title'=>'Todos los albumes', 'nickname'=>$nickname, 'albums'=>$albums, 'type'=>$type]);
    }

    public function showAlbum(Request $request){
        $image_data = $request->session()->get('image_data');
        $nickname = $request->session()->get('nickname');
        $type = $request->session()->get("type");
        $album = new Album();
        $albumes = $album->get($nickname);
        return view('album_list', ['nickname'=>$request->session()->get('nickname'), 'albumes'=>$albumes, 'title'=>'Tus albumes', 'type'=>$type]);
    }

    public function addImage(Request $request){
        $albumes = $request->input('albums');
        $image_data = $request->session()->get('image_data');
        $photo = $request->file('image');
        $validator = Validator::make(array('photo'=>$photo), [
            'photo' => 'required|image'
        ]);
        if($validator->fails()){
            return redirect('showAlbums')->withErrors($validator);
        }
        if(empty($image_data[0])){
            return view('not_found', ['title'=> '404: Página no encontrada']);
        }else{
            $image = $image_data[0];
        }
        $extension = $request->file('image')->getClientOriginalExtension();
        $image->title = $image->title.'.'.$extension;
        $image->photo = $request->file('image')->storeAs($image->nickname, $image->title);
        $image->save();
        if(count($albumes) > 0){
            foreach($albumes as $album):
                $imageBuilder = new imagexalbum();
                $contador =  $imageBuilder->countImages($album, $image->nickname) + 1;
                $temp = new imagexalbum;
                $temp->order_number = $contador;
                $temp->album_name = $album;
                $id = $image->getId($image->nickname, $image->title);
                $temp->image_id = $id[0]->id;
                $temp->nickname = $image->nickname;
                $temp->save();               
            endforeach;
            $request->session()->forget('image_data');
            return redirect('albums');
        }
    }
}
