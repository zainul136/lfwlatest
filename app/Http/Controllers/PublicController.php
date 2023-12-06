<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        return view('homepage');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contactpage');
    }

    public function features(){
        return view('features');
    }
}
