<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">
                <i class="fas fa-film mr-2"></i>
                Gallery
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 {{Route::currentRouteName()=='index' ? 'active':''}}" aria-current="page" href="{{route('index')}}">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 {{Route::currentRouteName()=='videos' ? 'active':''}}" href="{{route('videos')}}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 {{Route::currentRouteName()=='categories' ? 'active':''}}" href="{{route('categories')}}">Categories</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link nav-link-2 {{Route::currentRouteName()=='login' ? 'active':''}}" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 {{Route::currentRouteName()=='register' ? 'active':''}}" href="{{route('register')}}">Register</a>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="{{Auth::user()->role === 'admin' ? route('admin.index'):route('guest.index')}}">{{Auth::user()->name}}</a>
                    </li>
                @endguest
            </ul>
            </div>
        </div>
    </nav>