@extends('frontend.layouts.layout')

@section('title')
    Video Search Result
@endsection

@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{asset('assets/frontend')}}/img/hero.jpg">
        <form class="d-flex tm-search-form" action = "{{route('video.search')}}" method = "GET">
            
            <input class="form-control tm-search-input" type="search" placeholder="Search" name = "search" value = "{{$search}}" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Video Search Result
            </h2>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            @foreach($results as $video)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{asset('uploads/videos/thumbnails')}}/{{$video->thumbnail}}" alt="Image" class="img-fluid">
                        {{--<video width="420" height="236" autoplay muted loop>
                            <source src="{{asset('uploads/videos')}}/{{$video->video}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>--}}
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$video->title}}</h2>
                            <a href="{{route('video.details',$video->id)}}">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span>{{ date('F j, Y', strtotime($video->created_at)) }}</span>
                        <span>{{$video->views}} views</span>
                    </div>
                </div>
            @endforeach 
        </div> <!-- row -->
    </div>
@endsection