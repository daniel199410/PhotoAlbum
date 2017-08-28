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
        $comments = DB::table('comment')
            ->where([
                ['img_nick', '=', $nickname],
            ])
            ->join('image', [
                ['image_id', '=', 'image.id']
            ])->get();
        return $comments;
    }
}