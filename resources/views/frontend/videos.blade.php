@extends('frontend.layouts.layout')

@section('title')
    Videos
@endsection

@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="{{asset('assets/frontend')}}/video/hero.mp4" type="video/mp4">
        </video>  
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <form class="d-flex position-absolute tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Videos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 180
                </form>
            </div>
        </div>



        <div class="row tm-mb-90 tm-gallery">
            @foreach($videos as $video)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <video width="420" height="236" autoplay muted loop>
                            <source src="{{asset('uploads/videos')}}/{{$video->video}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{$video->title}}</h2>
                            <a href="#">View more</a>
                        </figcaption>                    
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span>{{ date('F j, Y', strtotime($video->created_at)) }}</span>
                        <span>{{$video->views}} views</span>
                    </div>
                </div>
            @endforeach         
        </div> <!-- row -->

        <div>
            {{$videos->links()}}
        </div>
    </div>

    
@endsection