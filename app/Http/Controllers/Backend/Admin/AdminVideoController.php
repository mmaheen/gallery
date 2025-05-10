<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $videos = Video::with('category','user')->latest()->paginate(10);
        return view('backend.admin.video.table',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::select('id','name')->get();
        return view('backend.admin.video.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $video = new Video;
        $request->validate([
            'title' =>  'required',
            'video' => 'required|mimes:mp4,avi',
            'category'  =>  'required',
            'thumbnail' => "required|mimes:jpg,png"
        ]);

        $video_name = null;
        if(isset($request->video)){
            $video_name = "Video_".time().'.'.$request->video->extension();
            $request->video->move(public_path('uploads/videos'),$video_name);
        }

        $thumbnail_name = null;
        if(isset($request->thumbnail)){
            $thumbnail_name = "Thumbnail_".time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/videos/thumbnails'),$thumbnail_name);
        }

        // return $thumbnail_name;
        $video->title = $request->title;
        $video->category_id = $request->category;
        $video->video = $video_name;
        $video->thumbnail = $thumbnail_name;
        $video->user_id = Auth::user()->id;
        $video->views = 0;
        $video->save();
        session()->flash('create', 'Video successfully created');
        return redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $video = Video::find($id);
        $categories = Category::select('id','name')->get();
        return view('backend.admin.video.edit',compact('video','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $video = Video::find($id);
        $request->validate([
            'title' =>  'required',
            'video' => 'required|mimes:mp4,avi',
            'category'  =>  'required',
            'thumbnail' => 'required|mimes:jpg,png'
        ]);

        $video_name = null;
        if(isset($request->video)){
            $video_name = "Video_".time().'.'.$request->video->extension();
            $request->video->move(public_path('uploads/videos'),$video_name);
        }

        $thumbnail_name = null;
        if(isset($request->thumbnail)){
            $thumbnail_name = "Thumbnail_".time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/videos/thumbnails'),$thumbnail_name);
        }

        // return $thumbnail_name;
        $video->title = $request->title;
        $video->category_id = $request->category;
        $video->video = $video_name;
        $video->thumbnail = $thumbnail_name;
        $video->update();
        session()->flash('update','Video updated');
        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $video = Video::find($id);
        $video->delete();
        session()->flash('delete','Video successfully deleted');
        return redirect()->back();
    }
}
