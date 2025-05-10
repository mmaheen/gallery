@extends('backend.layouts.layout')

@section('title')
    Categories
@endsection

@section('content')
<div class="col-12 mt-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Users Table</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Since</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <th><img src="{{asset('uploads/users')}}/{{$user->photo}}" height ="25" width = "25" class = "rounded-circle" alt=""></th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{Str::title($user->role)}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection