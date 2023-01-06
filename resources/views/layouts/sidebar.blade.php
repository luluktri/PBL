<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{asset('images/logo.png')}}" alt="" style="width: 100%;height: 100%;" />
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item">
                    <a href="/dashboard" class="sidebar-link">
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->role == 'guru')
                @endif

                @if(Auth::user()->role == 'siswa')
                @endif

                @if(Auth::user()->role == 'admin')
                <li class="sidebar-item">
                    <a href="/guru" class="sidebar-link">
                        <i data-feather="hard-drive" width="20"></i>
                        <span>Data Guru</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/kelas" class="sidebar-link">
                        <i data-feather="bookmark" width="20"></i>
                        <span>Data Kelas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/siswa" class="sidebar-link">
                        <i data-feather="users" width="20"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/mapel" class="sidebar-link">
                        <i data-feather="book" width="20"></i>
                        <span>Data Mapel</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
