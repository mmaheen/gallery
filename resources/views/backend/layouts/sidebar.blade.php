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
                <span>{{Auth::user()->role}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{Auth::user()->role === 'admin' ? route('dashboard.index') : route('dashboard.guest.index')}}" class="nav-item nav-link {{Route::currentRouteName()=='dashboard.index' ? 'active':''}}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{Route::currentRouteName()=='photo.create'?'active':''}}" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Upload Item</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('photo.create')}}" class="dropdown-item d-flex justify-content-center">Photo</a>
                    <a href="{{route('video.create')}}" class="dropdown-item d-flex justify-content-center">Video</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-table me-2"></i>Tables</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{Auth::user()->role === 'admin' ? route('photo.index') :route('dashboard.guest.photo.index')}}" class="dropdown-item d-flex justify-content-center">Photo</a>
                    <a href="{{Auth::user()->role === 'admin' ? route('video.index') : route('dashboard.guest.video.index')}}" class="dropdown-item d-flex justify-content-center">Video</a>
                    <a href="{{Auth::user()->role === 'admin' ? route('category.index') :''}}" class="dropdown-item d-flex justify-content-center">Category</a>
                    <a href="{{Auth::user()->role === 'admin' ? route('user.index') :''}}" class="dropdown-item d-flex justify-content-center">User</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Authentication</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('dashboard.signup')}}" class="dropdown-item d-flex justify-content-center">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
</div>