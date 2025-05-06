@extends('backend.layouts.layout')

@section('title')
    Photos
@endsection

@section('content')
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
                                    
                                    <form action="{{route('photo.destroy',$photo->id)}}" method = "POST">
                                        @csrf
                                        @method('delete')
                                        <button class = "btn btn-danger">Delete</button>
                                    </form>
                                    <button class = "btn btn-warning">Edit</button>
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