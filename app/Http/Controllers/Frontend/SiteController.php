<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $photos=Photo::latest()->paginate(16);
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
        $categoryId= $photo->category->id;
        $category = Category::find($categoryId);
        // return $category->photo;
        $photo->views=$photo->views+1;
        $photo->update();
        $related_photos = $category->photo;
        return view('frontend.show.photo',compact('photo','related_photos'));
    }
}
