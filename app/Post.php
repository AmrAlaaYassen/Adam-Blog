<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = 'posts' ;
    // pm key
    protected $primaryKey = 'id' ;
    public $timestamps= true;


    // add user relation to the post
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
