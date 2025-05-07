@extends('frontend.layouts.layout')

@section('title')
    Search Result
@endsection

@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{asset('assets/frontend')}}/img/hero.jpg">
        <form class="d-flex tm-search-form" action = "{{route('home.search')}}" method = "GET">
            
            <input class="form-control tm-search-input" type="search" placeholder="Search" name = "search" value = "{{$search}}" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            @foreach($results as $photo)
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
    </div>
@endsection