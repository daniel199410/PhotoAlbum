<?php

namespace PhotoAlbum;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $usuario = "Usuarios";
    private $persona;
    private $nickname;
    private $avatar;
    private $name;

    public function __construct($value = null){
        parent::__construct();
        if($value != null)
            settype($value, 'object');
        if(is_object($value)){
            $this->nickname = isset($value->nickname) ? $value->nickname : null;
            $this->avatar = isset($value->avatar) ? $value->avatar : null;
            $this->name = isset($value->name) ? $value->name : null;
        }
    }

    
}
