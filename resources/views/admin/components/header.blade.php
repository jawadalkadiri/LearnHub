<nav class="navbar navbar-expand-lg navbar-dark navbar-admin">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#818cf8" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.5z"/>
      </svg>
      LearnHub <span class="brand-sub">Admin</span>
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="adminNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.courses.index') }}">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.lessons.index') }}">Lessons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.profile.index') }}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link position-relative" href="{{ route('admin.notifications.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
              <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
            </svg>
            @if(auth()->check() && auth()->user()->unreadNotifications()->count() > 0)
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.6rem;">
                {{ auth()->user()->unreadNotifications()->count() }}
              </span>
            @endif
          </a>
        </li>
      </ul>

      <div class="d-flex align-items-center gap-2">
        <form class="d-flex" role="search" action="{{ route('admin.courses.search') }}" method="GET">
          <input class="form-control form-control-sm me-2" type="search" placeholder="Search courses..." aria-label="Search" name="q" style="width:160px; background:#0f172a; border-color:rgba(255,255,255,0.12); color:#e2e8f0;">
          <button class="btn btn-sm btn-outline-primary" type="submit">Search</button>
        </form>

        @if(Auth::check())
          <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
              {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        @else
          <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary">Login</a>
          <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Register</a>
        @endif
      </div>
    </div>
  </div>
</nav>
