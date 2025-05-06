<?php

namespace App\Http\Controllers\Backend;

use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $photos = Photo::all();
        return view('backend.photo.table',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::select('id','name')->get();
        return view('backend.photo.create',compact('categories'));
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
                'photo'=>'required'
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
            $photo->user_id = 1;
            $photo->category_id = $request->category;
            $photo->views = 0;
            $photo->save();
            
            return redirect()->route('index');
        }
        catch(Exception $error){
            dd($errorr->getMessage());
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
