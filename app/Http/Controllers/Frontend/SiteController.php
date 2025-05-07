<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Photo;
use App\Models\Video;
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

    public function search(Request $request){
        $search = $request->search;
        // return $search;
        
        $photos = Photo::where('title','like',"%{$search}%")->get();
        // $photos = Photo::where(function($query) use ($search){
        //     $query->where('title', 'like' , '%$search%')->get();
        // });

        return $photos;
    }

    public function videos(){
        $videos = Video::latest()->paginate(16);
        return view ('frontend.videos',compact('videos'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function signin(){
        return view ('frontend.signin');
    }
    
    public function signup(){
        return view ('frontend.signup');
    }

    public function photo_details($id){
        $photo = Photo::find($id);
        $filePath = public_path('uploads/photos/'.$photo->photo);
        // return getimagesize($filePath);
        $photo_details = getimagesize($filePath);
        list($width, $height) = $photo_details;

        $photo_format = $photo_details['mime'];

        $categoryId= $photo->category->id;
        $category = Category::find($categoryId);
        // return $category->photo;
        $related_photos = $category->photo;

        $categories=Category::inRandomOrder()->select('id','name')->take(10)->get();
        // return $categories;

        $photo->views=$photo->views+1;
        $photo->update();

        return view('frontend.show.photo',compact('photo','related_photos','width','height','photo_format','categories'));
    }
    
    public function downloadPhoto(String $id) {
        $photo = Photo::find($id);
        $filePath = public_path('uploads/photos/'.$photo->photo); // Path to the file
        $fileName = 'Gallery'.' '.'-'.' '.$photo->photo; // Name for the downloaded file
        return response()->download($filePath, $fileName);
    }

    public function categories(){
        $categories = Category::latest()->get();
        return view ('frontend.show.categories',compact('categories'));
    }

    public function category_details($id){
        $category = Category::find($id);
        return view('frontend.show.category',compact('category'));
    }

    public function video_details($id){
        $video = Video::find($id);
        // return $video;

        $categoryId = $video->category_id;
        $category = Category::find($categoryId);
        // return $category->video;

        $related_videos = $category->video;

        $categories = Category::inRandomOrder()->take(10)->get();

        $video->views = $video->views+1;
        $video->update();
        return view('frontend.show.video', compact('video','related_videos','categories'));
    }
}
