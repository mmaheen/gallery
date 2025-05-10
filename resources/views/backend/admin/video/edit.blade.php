@extends('backend.layouts.layout')

@section('title')
    Video Edit
@endsection

@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row ">         
            <form class="col-sm-12 col-xl-10" action="{{route('admin.video.update',$video->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Video</h6>
                    @error('title')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span> 
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="text" name="title" value = "{{$video->title}}" class="form-control" id="floatingInput"
                            placeholder="Video title">
                        <label for="floatingInput">Video Title</label>
                    </div>

                    @error('video')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span>
                    @enderror
                    <div class="mb-3">
                        <label for="formFileLg" class="form-label">Select your Video</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" name="video">
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
                                <option value="{{$category->id}}" {{$video->category->id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select Category</label>
                    </div>
                    
                    @error('thumbnail')
                        <span class="text-danger font-italic">
                            {{$message}}
                        </span>
                    @enderror
                    <div>
                        <label for="formFileLg" class="form-label">Thumbnail</label>
                        <input class="form-control" id="formFileLg" type="file" name="thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Form End -->
@endsection