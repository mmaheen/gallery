@extends('frontend.layouts.layout')

@section('title')
    Category - {{$category->name}}
@endsection

@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{asset('assets/frontend')}}/img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Category: {{$category->name}}
            </h2>
        </div>
        <div class="row mb-4">
            <h4 class="col-6 tm-text-primary">
                Photos
            </h4>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            @foreach($category->photo as $photo)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{asset('uploads/photos')}}/{{$photo->photo}}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$photo->title}}</h2>
                            <a href="{{route('photo.details',$photo->id)}}">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{ date('F j, Y', strtotime($photo->created_at)) }}</span>
                        <span>{{$photo->views}} views</span>
                    </div>
                </div>
            @endforeach
        </div> <!-- row -->
        
        {{--<div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <div class="tm-paging d-flex">
                    <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                    <a href="javascript:void(0);" class="tm-paging-link">2</a>
                    <a href="javascript:void(0);" class="tm-paging-link">3</a>
                    <a href="javascript:void(0);" class="tm-paging-link">4</a>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>            
        </div>--}}
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h4 class="col-6 tm-text-primary">
                Videos
            </h4>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            @foreach($category->video as $video)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{asset('uploads/videos/thumbnails')}}/{{$video->thumbnail}}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$video->title}}</h2>
                            <a href="{{route('video.details',$video->id)}}">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{ date('F j, Y', strtotime($video->created_at)) }}</span>
                        <span>{{$video->views}} views</span>
                    </div>
                </div>
            @endforeach
        </div> <!-- row -->
    </div>
@endsection