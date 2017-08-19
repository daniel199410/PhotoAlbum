<?php

namespace PhotoAlbum\Http\Controllers;

use Illuminate\Http\Request;

class ControladorUsuario extends Controller
{
    public function index(){
        return view('login');
    }
}
