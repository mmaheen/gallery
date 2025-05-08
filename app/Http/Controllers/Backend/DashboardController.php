<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index(){
        $photo = Photo::select('id')->get();
        $photo_count = count($photo);
        
        $user = User::select('id')->get();
        $user_count = count($user);

        $video = Video::select('id')->get();
        $video_count = count($video);

        $category = Category::select('id')->get();
        $category_count = count($category);
        return view('backend.dashboard',compact('photo_count','user_count','video_count','category_count'));
    }

    public function signin(){
        return view('backend.signin');
    }

    public function signup(){
        return view('backend.signup');
    }
}
