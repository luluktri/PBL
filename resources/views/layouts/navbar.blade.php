<nav class="navbar navbar-header navbar-expand navbar-light">
    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
            <li class="dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar me-1">
                        <img src="{{asset('images/admin.png')}}" alt="" srcset="" />
                    </div>
                    <div class="d-none d-md-block d-lg-inline-block">
                        @if(Auth::user()->role == 'admin')
                        Admin
                        @endif
                        @if(Auth::user()->role == 'guru')
                        Guru
                        @endif
                        @if(Auth::user()->role == 'siswa')
                        Siswa
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    @if(Auth::user()->role == 'admin')
                    @else
                    <a class="dropdown-item" href="/profile"><i data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i data-feather="log-out"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
