@extends('backend.layouts.layout')

@section('title')
    Categories
@endsection

@section('content')
    <div class="col-12 mt-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between">
                <h6 class="mb-4">Categories</h6>
                <a href="{{route('category.create')}}" class = "btn btn-link rounded-pill">Create Category</a>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Since</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td><img src="{{asset('uploads/categories')}}/{{$category->image}}" height="30px" alt=""></td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->user->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{route('category.destroy',$category->id)}}" method= "POST">
                                        @csrf
                                        @method('delete')
                                        <button class = "btn btn-sm btn-danger" onclick = "event.preventDefault(); this.closest('form').submit()">Delete</button>
                                    </form>
                                    
                                    <a href = "{{route('category.edit',$category->id)}}" class = "btn btn-sm btn-warning">Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection