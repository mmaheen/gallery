<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
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
        return view('backend.admin.dashboard',compact('photo_count','user_count','video_count','category_count'));
    }

    public function adminRegister(Request $request){
        // return $request;
        $photo_name = null;
        if(isset($request->photo)){
            $photo_name='User_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/users'),$photo_name);
        }
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->photo = $photo_name;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('dashboard.index');
    }

    public function photos(){  
        $photos = Photo::with('category','user')->latest()->paginate(10);
        return view('backend.admin.photo.table',compact('photos'));
    }

    public function videos(){
        $videos = Video::with('category','user')->latest()->paginate(10);
        return view('backend.admin.video.table',compact('videos'));
    }

    public function categories(){
        $categories = Category::with('user')->latest()->paginate(10);
        return view('backend.admin.category.table',compact('categories'));
    }

    public function settings(){
        return view('backend.admin.settings');
    }

    public function profile(){
        return view('backend.admin.profile');
    }

    public function signup(){
        return view('backend.admin.signup');
    }
}
