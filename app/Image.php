<?php

namespace PhotoAlbum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    protected $table = 'Image';
    public $timestamps = false;
    private $photo;
    private $description;
    private $privacity;
    private $title;
    private $order_number;

    public function __construct($value = null){
        parent::__construct();
        if($value != null)
            settype($value, 'object');
        if(is_object($value)){
            $this->photo = isset($value->photo) ? $value->photo : null;
            $this->description = isset($value->description) ? $value->description : null;
            $this->privacity = isset($value->privacity) ? $value->privacity : null;
            $this->title = isset($value->title) ? $value->title : null;
            $this->order_number = isset($value->order_number) ? $value->order_number : null;
        }
    }

    public function exists($nickname){
        $image = DB::table('Image')->where([
            ['nickname', '=', $nickname],
            ['title', '=', $this->title] 
        ])->get();
        if(empty($image[0])){
            return false;
        }
        return true;
    }

    public function get($nickname){
        $image = DB::table('Image')->where([
            ['nickname', '=', $nickname],
            ['title', '=', $this->title] 
        ])->get();
        return $image[0];
    }

    public function guardar(){
        $temp = new Image;
        $temp->photo = $this->photo;
        $temp->description = $this->description;
        $temp->privacity = $this->privacity;
        $temp->title = $this->title;
        $temp->nickname = $this->nickname;
        echo $temp;
    }
}