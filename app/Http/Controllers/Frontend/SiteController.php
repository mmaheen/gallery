<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(){
        return view ('frontend.index');
    }

    public function videos(){
        return view ('frontend.videos');
    }

    public function about(){
        return view('frontend.about');
    }
}
