<nav class="navbar navbar-expand navbar-light navbar-bg justify-content-between">
    
    <i class="bi bi-list mobile-nav-toggle"></i>
    <div>
        <a class="">
         TEST SOCIO
        </a>
    </div>
    

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item d-flex text-decoration-none">
                <a class="nav-icon {{ Request::is('/') ? 'active' : '' }}" href="/">
                    Home
                </a>
                <a class="nav-icon {{ Request::is('allpost*') ? 'active' : '' }}" href="/allpost">
                    All Post
                </a>
                @auth
                    <a class="nav-icon {{ Request::is('mypost*') ? 'active' : '' }}" href="/mypost">
                        My Post
                    </a>
                @endauth
            </li>
        </ul>
        <ul class="navbar-nav navbar-align">

                @auth
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('backend/asset/img/no-image-available.png') }}" class="avatar img-fluid rounded me-1" alt="default" /> <span class="text-dark">{{auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                        {{-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a> --}}
                        <form action="/logout" method="POST">
                            @csrf
                              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right" data-feather="log-out"></i> Log out</button>
                        </form>
                    </div>
                @else
                    <a class="nav-link d-none d-sm-inline-block" href="/login">
                        <i class="" data-feather="user"></i><span class="text-dark">Login</span>
                    </a>
                @endauth
            </li>
        </ul>
    </div>
</nav>

