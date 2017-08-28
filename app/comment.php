<?php

namespace PhotoAlbum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class comment extends Model
{
    protected $table = "comment";
    public $timestamps = false;
    private $comment;

    public function __construct($value = null){
        parent::__construct();
        if($value != null)
            settype($value, 'object');
        if(is_object($value)){
            $this->comment = isset($value->comment) ? $value->comment : null;
        }
    }

    public function get($image_title, $nickname){
        $comments = DB::table('comment')->select('comment', 'nickname')->where([
            ['img_nick', '=', $nickname],
            ['image_title', '=', $image_title]
        ])->get();
        return $comments;
    }
}