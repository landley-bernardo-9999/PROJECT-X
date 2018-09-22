<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        //$title = 'Welcome to Vester!';
        return view('pages.index');
        //return view('pages.index')->with('title',$title);
        
    }

    public function template(){
        return view('layouts.template');
    }

    public function dashboard(){
        return view('/pages.dashboard');
    }

    public function signup(){
        return view('/pages.signup');
    }

    public function forgotpassword(){
        return view('/pages.forgotpassword');
    }


}
