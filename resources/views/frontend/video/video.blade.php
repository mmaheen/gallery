@extends('frontend.layouts.layout')

@section('title')
    Photo - {{$video->title}}
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
            <h2 class="col-12 tm-text-primary">{{$video->title}}</h2>
        </div>
        <div class="row tm-mb-90">            
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <video height = "600" autoplay muted loop controls>
                    <source src="{{asset('uploads/videos')}}/{{$video->video}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <p class="mb-4">
                        Please support us by making <a href="https://paypal.me/templatemo" target="_parent" rel="sponsored">a PayPal donation</a>. Nam ex nibh, efficitur eget libero ut, placerat aliquet justo. Cras nec varius leo.
                    </p>
                    <div class="text-center mb-5">
                        {{--<a href="{{route('photo.download',$photo->id)}}" class="btn btn-primary tm-btn-big">Download</a>--}}
                    </div>                    
                    <div class="mb-4 d-flex flex-wrap">
                        {{--<div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">{{$width}}x{{$height}}</span>
                        </div>--}}
                        {{--<div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">@php echo strtoupper($photo_format) @endphp</span>
                        </div>--}}
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Views: </span><span class="tm-text-primary">{{$video->views}}</span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Uploader: </span><span class="tm-text-primary">{{$video->user->name}}</span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">At: </span><span class="tm-text-primary">{{$video->created_at}}</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">Category: <span class = "tm-text-primary">{{$video->category->name}}</span></h3>
                        <p>Free for both personal and commercial use. No need to pay anything. No need to make any attribution.</p>
                    </div>
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                        @foreach($categories as $category)
                            <a href="{{route('category.details',$category->id)}}" class="tm-text-primary mr-4 mb-2 d-inline-block">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Related Photos
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @foreach($related_videos as $video)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        {{--<img src="{{asset('uploads/videos/thumbnails')}}/{{$video->thumbnail}}" alt="Image" class="img-fluid">--}}
                        <video src="{{asset('uploads/videos')}}/{{$video->video}}" width="420" height="236" autoplay muted loop></video>
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$video->title}}</h2>
                            <a href="{{route('video.details',$video)}}">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{$video->created_at}}</span>
                        <span>{{$video->views}} views</span>
                    </div>
                </div>
            @endforeach        
        </div>
    </div> <!-- container-fluid, tm-container-content -->

@endsection