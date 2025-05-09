<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::with('user')->latest()->paginate(10);
        return view('backend.admin.category.table',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('backend.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'image' => 'required'
        ]);

        $file_name = null;

        if(isset($request->image)){
            $file_name = "category_".time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/categories'),$file_name);
        }

        try{
            $category = new Category;
            $category->name = $request->name;
            $category->image = $file_name;
            $category->user_id = Auth::user()->id;
            $category->save();
            return redirect()->route('category.index');
        }
        catch(Exception $error){
            $error->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        // return $category;
        return view('backend.admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ],[
            'name.required' => 'Category title required'
        ]);
        $photo_name = null;
        if(isset($request->image)){
            $photo_name = time().'_updated_'.'.'.$request->image->extension();
            $request->image->move(public_path('uploads/categories'),$photo_name);
        }
        try{
            $category->name = $request->name;
            $category->image = $photo_name;
            $category->update();
            return redirect()->route('category.index');
        }
        catch(Exception $error){
            $error->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        // return $category;
        $category->delete();
        return redirect()->back();
    }
}
