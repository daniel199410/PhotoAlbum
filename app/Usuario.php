<?php

namespace PhotoAlbum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    protected $table = "Usuarios";
    public $timestamps = false;
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
            $this->password = isset($value->password) ? $value->password : null;
            $this->name = isset($value->name) ? $value->name : null;
        }
    }

    public function register(){
        DB::table('Usuarios')->insert(
            array(
                'name' => $this->name, 
                'nickname' => $this->nickname,
                'password' => $this->password
            )
        );
        return true;
    }

    public function existeNick(){
        return empty(DB::table('Usuarios')->where('nickname', $this->nickname)->get) ? false : true;
    }

    public function exists(){
        $username = DB::table('Usuarios')->where('nickname', $this->nickname)->get();
        if(!empty($username[0])){
            $password = $username[0]->password;
            if (Hash::check($this->password, $password)){
                return true;
            }
        }
        return false;
    }
}