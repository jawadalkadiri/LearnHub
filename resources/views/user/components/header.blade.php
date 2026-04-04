<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.courses.index') }}">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.enrollments.index') }}">My Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
        </li>

        @if(Auth::check())
            <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">LogOut</button>
                            </form>
                        </li>
                    </ul>
                </div>
        @else
            <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-primary">Login</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-primary">Register</button></a>
                    </li>
        @endif


      </ul>
        <form class="d-flex" role="search" action="{{ route('user.courses.search') }}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q"/>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
  </div>
</nav>


