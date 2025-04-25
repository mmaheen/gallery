<?php

namespace App\Http\Controllers\Backend;

use App\Models\Photo;
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request;
        $request->validate(
            [
                'title'=>'required',
                'photo'=>'required'
            ],
            [
                'description.required'=>'Please, add some text'
            ]
        );
        try{
            $photo_name = null;
            if(isset($request->photo)){
                $photo_name=time().'.'.$request->photo->extension();
                $request->photo->move(public_path('uploads/photos'),$photo_name);
            }

            $photo = new Photo;
            $photo->title = $request->title;
            $photo->photo = $photo_name;
            $photo->user_id = 1;
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
