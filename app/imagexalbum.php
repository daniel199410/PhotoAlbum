<?php

namespace PhotoAlbum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class imagexalbum extends Model
{
    protected $table = "imagexalbum";
    public $timestamps = false;
    private $order_number;

    public function __construct($value = null){
        parent::__construct();
        if($value != null)
            settype($value, 'object');
        if(is_object($value)){
            $this->order_number = isset($value->order_number) ? $value->order_number : null;
        }
    }

    public function countImages($album, $nickname){
        $count = DB::table('imagexalbum')
            ->where([
                ['album_name', '=',  $album],
                ['nickname', '=',  $nickname]
            ])
            ->count('order_number');
        return $count;
    }
}
