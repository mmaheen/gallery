@extends('backend.layouts.layout')

@section('title')
@endsection

@section('content')
    <div class="card text-bg-dark">
        <img src="{{asset('uploads/photos')}}/{{$photo->photo}}" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title">Title: {{$photo->title}}</h5>
            <h6 class="card-title text-secondary">Category: {{$photo->category->name}}</h6>
            <p class="card-text">Uploader: {{$photo->user->name}}</p>
            <p class="card-text"><small>At: {{date('F j, Y', strtotime($photo->created_at))}}</small></p>
        </div>
    </div>
@endsection