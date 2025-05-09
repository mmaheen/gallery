@extends('backend.layouts.layout')

@section('title')
    Category Edit
@endsection

@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row ">         
            <form class="col-sm-12 col-xl-10" action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Category</h6>
                    @error('name')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span> 
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="text" name="name" value = "{{$category->name}}" class="form-control" id="floatingInput"
                            placeholder="Category name">
                        <label for="floatingInput">Category Title</label>
                    </div>
                    
        
                    
                    @error('image')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span>
                    @enderror
                    <div>
                        <label for="formFileLg" class="form-label">File input</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Form End -->
@endsection