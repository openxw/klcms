<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top ">
  <div class="container">
    {{-- Branding Image  --}}
    <a href="{{ url('/') }} " class="navbar-brand">KLCMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      {{-- Left Side Of Navbar  --}}
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('contents.index') }}">首页</a></li>
        @foreach(\App\Models\Category::all() as $cat)
            <li class="{{ category_nav_active($cat->id) }}">
                <a class="nav-link" href="{{ route('categories.show', $cat->id) }}">{{ $cat->name }}</a>
            </li>
        @endforeach
      </ul>

      {{-- Right Side of Navbar  --}}
      <ul class="navbar-nav navbar-right">
        {{-- Authentication Links  --}}
        @guest
        <li class="nav-item"><a href='{{ route('login') }}' class='nav-link'>登录</a></li>
        {{-- <li class="nav-item"><a href='{{ route('register') }}' class='nav-link'>注册</a></li> --}}
      </ul>
        @else
        <li class="nav-item">
          <a class="nav-link mt-1 mr-3 font-weight-bold" href="{{ route('contents.create') }}">
            <i class="fa fa-plus"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
          {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="{{ url(config('administrator.uri')) }}">
                  <i class="fas fa-tachometer-alt mr-2"></i>
                  管理后台
                </a>
                <div class="dropdown-divider"></div>

            <a class="dropdown-item" href=""> <i class="far fa-user mr-2"></i>个人中心</a>
            <a class="dropdown-item" href="">编辑资料</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">
                <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
            </a>
          </div>
      </li>
        @endguest


    </div>
  </div>
</nav>
