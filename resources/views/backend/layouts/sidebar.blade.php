<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('index')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>GALLERY</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('uploads/users')}}/{{Auth::user()->photo}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <span>{{ucfirst(Auth::user()->role)}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{Auth::user()->role === 'admin' ? route('admin.index') : route('guest.index')}}" class="nav-item nav-link {{Route::currentRouteName()=='admin.index' || Route::currentRouteName()=='guest.index' ? 'active':''}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{Route::currentRouteName()=='admin.photo.create'||Route::currentRouteName()=='admin.video.create'?'active':''}}" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Upload Item</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('admin.photo.create')}}" class="dropdown-item d-flex justify-content-center">Photo</a>
                    <a href="{{route('admin.video.create')}}" class="dropdown-item d-flex justify-content-center">Video</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" 
                class="nav-link dropdown-toggle {{Route::currentRouteName()=='admin.photo.index' || Route::currentRouteName()=='guest.photos' || Route::currentRouteName()=='admin.video.index' || Route::currentRouteName()=='guest.videos' || Route::currentRouteName()=='admin.categories' || Route::currentRouteName()=='guest.categories' || Route::currentRouteName()=='user.index' ? 'active':''}}" 
                data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>Tables</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{Auth::user()->role === 'admin' ? route('admin.photo.index') :route('guest.photos')}}" class="dropdown-item d-flex justify-content-center">Photo</a>
                    <a href="{{Auth::user()->role === 'admin' ? route('admin.video.index') : route('guest.videos')}}" class="dropdown-item d-flex justify-content-center">Video</a>
                    <a href="{{Auth::user()->role === 'admin' ? route('admin.categories') : route('guest.categories')}}" class="dropdown-item d-flex justify-content-center">Category</a>
                    @if(Auth::user()->role == 'admin')
                        <a href="{{route('user.index')}}" class="dropdown-item d-flex justify-content-center">User</a>
                    @endif
                </div>
            </div>
            @if(Auth::user()->role == 'admin')
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{Route::currentRouteName()=='admin.signup' ? 'active':''}}" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Authentication</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('admin.signup')}}" class="dropdown-item d-flex justify-content-center">Sign Up</a>
                </div>
            </div>
            @endif
        </div>
    </nav>
</div>