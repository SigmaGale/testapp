<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        return view('pages.index')->with('title',"Welcome to Twatter");
    }
    public function login(){
        
        return view('pages.login')->with('title',"Log in");
    }

    public function restricted(){
        return "test";
    }

}
