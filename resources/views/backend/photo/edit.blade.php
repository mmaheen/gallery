@extends('backend.layouts.layout')

@section('title')
    Photo Edit
@endsection

@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row ">         
            <form class="col-sm-12 col-xl-10" action="{{route('photo.update',$photo->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Photo</h6>
                    @error('title')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span> 
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="text" name="title" value = "{{$photo->title}}" class="form-control" id="floatingInput"
                            placeholder="Photo title">
                        <label for="floatingInput">Photo Title</label>
                    </div>
                    
                    @error('category')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span>
                    @enderror
                    <div class="form-floating mb-3">
                        <select class="form-select" name="category" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option value="" selected>Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$photo->category->id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Category</label>
                    </div>
                    
                    @error('photo')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span>
                    @enderror
                    <div>
                        <label for="formFileLg" class="form-label">File input</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="photo">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Form End -->
@endsection