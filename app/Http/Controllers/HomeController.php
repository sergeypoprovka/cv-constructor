<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function constructor(){
        return view('constructor');
    }

    public function about(){
        return view('about');
    }
}
