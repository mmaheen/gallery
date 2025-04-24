@extends('frontend.layouts.layout')
@section('content')
    <div class="col-12 mb-5">
        <h2 class="tm-text-primary mb-5">Contact Page</h2>
        <form id="contact-form" action="{{route('photo.store')}}" method="POST" class="tm-contact-form mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="description" class="form-control rounded-0" placeholder="Enter Description" />
            </div>

            <div class="form-group">
                <input type="file" name="photo" class="form-control" />
            </div>
            

            <div class="form-group tm-text-right">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>                
    </div>
@endsection