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
}
