<?php

namespace App\Http\Controllers\Backend;

use App\Models\Photo;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    //
    public function index(){
        return view ('backend.guest.dashboard');
    }

    public function photoIndex(){
        $user = auth()->user()->id;
        $photos = Photo::where('user_id',$user)->with('category')->paginate(10);
        // return $photo;
        return view ('backend.guest.photo.table',compact('photos'));
    }

    public function videoIndex(){
        $user = auth()->user()->id;
        $videos = Video::where('user_id',$user)->with('category')->paginate(10);
        return view ('backend.guest.video.table',compact('videos'));
    }

    public function categoryIndex(){
        $user = auth()->user()->id;
        $categories = Category::where('user_id',$user)->paginate(10);
        return view ('backend.guest.category.table',compact('categories'));
    }
}
