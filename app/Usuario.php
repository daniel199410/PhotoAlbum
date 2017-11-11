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
    private $type;

    public function __construct($value = null){
        parent::__construct();
        if($value != null)
            settype($value, 'object');
        if(is_object($value)){
            $this->nickname = isset($value->nickname) ? $value->nickname : null;
            $this->password = isset($value->password) ? $value->password : null;
            $this->name = isset($value->name) ? $value->name : null;
            $this->type = isset($value->type) ? $value->type : null;
        }
    }

    public function getType(){
        $type = DB::table('Usuarios')->select('type')->where('nickname', $this->nickname)->get();
        return $type[0]->type;
    }

    public function existeNick(){
        $nick = DB::table('Usuarios')->where('nickname', $this->nickname)->get();
        if(!empty($nick[0])){
            return true;
        }
        return false;
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