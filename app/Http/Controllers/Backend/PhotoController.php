<?php

namespace App\Http\Controllers\Backend;

use File;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $photos = Photo::with('category','user')->latest()->paginate(10);
        return view('backend.admin.photo.table',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::select('id','name')->get();
        return view('backend.admin.photo.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'title'=>'required',
                'category'=>'required',
                'photo'=>'required|mimes:jpg,png'
            ],
            [
                'title.required'=>'Please, add some text'
            ]
        );
        $photo_name = null;
        if(isset($request->photo)){
            $photo_name=time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/photos'),$photo_name);
        }

        try{
            $photo = new Photo;
            $photo->title = $request->title;
            $photo->photo = $photo_name;
            $photo->user_id = Auth::user()->id;
            $photo->category_id = $request->category;
            $photo->views = 0;
            $photo->save();
            session()->flash('create','Photo upload success');
            
            return redirect()->route('photo.index');
        }
        catch(Exception $error){
            dd($error->getMessage());
        }
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
        $photo = Photo::find($id);
        $categories = Category::select('id','name')->get();
        return view('backend.admin.photo.edit',compact('photo','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // return $id;
        $photo = Photo::find($id);
        // return $photo;
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'photo'=>'required|mimes:jpg,png',
        ]);

        $photo_name = null;
        if(isset($request->photo)){
            $photo_name = time().'_updated'.'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/photos'),$photo_name);
        }

        try{
            $photo->title = $request->title;
            $photo->category_id= $request->category;
            $photo->photo = $photo_name;
            $photo->update();
            session()->flash('update','Photo Update success');
            return redirect()->route('photo.index');
        }
        catch(Exception $error){
            dd($error->getMessage());
        }

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $photo = Photo::find($id);
        // return $photo;

        $file_path=public_path('uploads/photos/').$photo->photo;
        // return $file_path;
        if(File::exists($file_path)){
            File::delete($file_path);
        }
        else{
            session()->flash('no_file','Deleted. No files were here');
        }
        $photo->delete();
        session()->flash('delete','Photo successfully deleted');
        return redirect()->back();
    }
}
