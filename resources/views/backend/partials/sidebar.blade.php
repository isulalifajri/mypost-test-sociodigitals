<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
    <span class="align-middle">AdminKit</span></a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ ('/dashboard') }}">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
            </li>

            

            <li class="sidebar-item {{ Request::is('blog*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ ('/blog') }}">
                <i class="align-middle" data-feather="book"></i> <span class="align-middle">BLogs</span>
                </a>
            </li>
            
        </ul>

        
    </div>
</nav>