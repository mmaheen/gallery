@extends('backend.layouts.layout')

@section('title')
    Photos
@endsection

@section('content')
    @if(session('create'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('create')}}
        </div>
    @endif
    @if(session('update'))
        <div class="alert alert-success text-center" role="alert">
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
            <h6 class="mb-4">Photos</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <th scope="col">User</th>
                            <th scope="col">Category</th>
                            <th scope="col">Views</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($photos as $photo)
                        <tr>
                            <th scope="row">{{$photo->id}}</th>
                            <td><img src="{{asset('uploads/photos')}}/{{$photo->photo}}" height = "30px" alt=""></td>
                            <td>{{$photo->title}}</td>
                            <td>{{$photo->user->name}}</td>
                            <td>{{$photo->category->name}}</td>
                            <td>{{$photo->views}}</td>
                            <td>{{$photo->created_at}}</td>
                            <td>
                                <div class="btn-group">      
                                    <form action="{{route('admin.photo.destroy',$photo->id)}}" method = "POST">
                                        @csrf
                                        @method('delete')
                                        <button class = "btn btn-danger" onclick="event.preventDefault(); this.closest('form').submit()">Delete</button>
                                    </form>
                                    <a href="{{route('admin.photo.show',$photo->id)}}" class = "btn btn-info">Show</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$photos->links()}}
            </div>
        </div>
    </div>
@endsection