<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function about (){
        $title = 'About us ' ;
        return view('pages.about')->with('title' , $title);
    }


}
