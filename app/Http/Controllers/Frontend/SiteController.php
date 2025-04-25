<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $photos=Photo::latest()->get();
        return view ('frontend.index',compact('photos'));
    }

    public function videos(){
        return view ('frontend.videos');
    }

    public function about(){
        return view('frontend.about');
    }

    public function photo_details($id){
        $photo = Photo::find($id);
        $photo->views=$photo->views+1;
        $photo->update();
        $related_photos = Photo::latest()->take(8)->get();
        return view('frontend.show.photo',compact('photo','related_photos'));
    }
}
