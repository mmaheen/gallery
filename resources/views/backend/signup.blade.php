@extends('backend.layouts.layout')

@section('title')
    Sign Up
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="{{route('dashboard.index')}}" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Gallery</h3>
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <form action="{{ route('admin.register') }}" method = "POST" enctype = "multipart/form-data">
                        @csrf
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" placeholder="jhondoe" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="floatingText">Username</label>
                        </div>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required autocomplete="new-password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        @error('role')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role"
                                        id="gridRadios1" value="admin">
                                    <label class="form-check-label" for="gridRadios1">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role"
                                        id="gridRadios2" value="guest" checked>
                                    <label class="form-check-label" for="gridRadios2">
                                        Guest
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-floating mb-4">
                            <input type="file" class="form-control" id="floatingPassword" name="photo" required>
                            <label for="floatingPassword">Profile picture</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                    </form>
                    
                    <p class="text-center mb-0">Already have an Account? <a href="{{route('dashboard.signin')}}">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection