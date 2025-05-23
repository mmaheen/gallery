@extends('backend.layouts.layout')

@section('title')
    Videos
@endsection

@section('content')
    @if(session('create'))
        <div class="alert alert-success text-center" role="alert">
            {{session('create')}}
        </div>
    @endif
    @if(session('update'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('update')}}
        </div>
    @endif
    @if(session('delete'))
        <div class="alert alert-danger text-center" role="alert">
            {{session('delete')}}
        </div>
    @endif
    <div class="col-12 mt-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Videos</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">User</th>
                            <th scope="col">Category</th>
                            <th scope="col">Views</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <th scope="row">{{$video->id}}</th>
                            <td><img src="{{asset('uploads/videos/thumbnails')}}/{{$video->thumbnail}}" height = "30px" alt=""></td>
                            <td>{{$video->title}}</td>
                            <td>{{$video->user->name}}</td>
                            <td>{{$video->category->name}}</td>
                            <td>{{$video->views}}</td>
                            <td>{{$video->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    
                                    <form action="{{route('admin.video.destroy',$video->id)}}" method = "POST">
                                        @csrf
                                        @method('delete')
                                        <button class = "btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit()">Delete</button>
                                    </form>
                                    <a href="{{route('admin.video.edit',$video->id)}}" class = "btn btn-warning">Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$videos->links()}}
            </div>
        </div>
    </div>
@endsection