<?php

namespace PhotoAlbum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
    protected $table = 'album';
    public $timestamps = false;
    private $name;
    private $description;
    private $privacity;
    private $nickname;

    public function __construct($value = null){
        parent::__construct();
        if($value != null)
            settype($value, 'object');
        if(is_object($value)){
            $this->description = isset($value->description) ? $value->description : null;
            $this->name = isset($value->name) ? $value->name : null;
            $this->privacity = isset($value->privacity) ? $value->privacity : null;
            $this->nickname = isset($value->nickname) ? $value->nickname : null;
        }
    }

    public function exists($nickname){
        $album = DB::table('album')->where([
            ['name', '=', $this->name],
            ['nickname', '=', $nickname]
        ])->get();
        if(empty($album[0])){
            return false;
        }
        return true;
    }

    public function album($nickname){
        return DB::table('album')->where([
            ['name', '=', $this->name],
            ['nickname', '=', $nickname]
        ])->get();
    }

    public function get($nickname){
        return DB::table('album')->where('nickname', $nickname)->get();
    }
}
