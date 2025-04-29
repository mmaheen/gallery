<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('backend.dashboard');
    }

    public function table(){
        return view('backend.table');
    }

    public function signin(){
        return view('backend.signin');
    }

    public function signup(){
        return view('backend.signup');
    }
}
