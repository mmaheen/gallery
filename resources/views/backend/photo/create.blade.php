@extends('frontend.layouts.layout')

@section('title')
    Upload Photo
@endsection

@section('content')
    <div class="col-12 mb-5">
        <h2 class="tm-text-primary mb-5">Contact Page</h2>
        <form id="contact-form" action="{{route('photo.store')}}" method="POST" class="tm-contact-form mx-auto" enctype="multipart/form-data">
            @csrf

            @error('title')
                <span class="text-danger font-italic">
                    {{$message}}
                </span>
            @enderror
            <div class="form-group">
                <input type="text" name="title" value = "{{old('title')}}" class="form-control rounded-0" placeholder="Enter Photo Title"  />
            </div>

            @error('category')
                <span class="text-danger font-italic">
                    {{$message}}
                </span>
            @enderror
            <div class="form-group">
                <select class="form-control" id="contact-select" name="category">
                    <option value="" selected>Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('category') == $category->id ? 'selected':''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            @error('photo')
                <span class="text-danger font-italic">
                    {{$message}}
                </span>
            @enderror
            <div class="form-group">
                <input type="file" name="photo" class="form-control"/>
            </div>
            

            <div class="form-group tm-text-right">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>                
    </div>
@endsection