<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="{{ route('admin.index') }}">
                <b class="logo-icon">
                    <img src="{{ asset('admin_panel/plugins/images/logo-icon.png') }}" alt="homepage" />
                </b>
                <span class="logo-text">
                    <img src="{{ asset('admin_panel/plugins/images/logo-text.png') }}" alt="homepage" />
                </span>
            </a>
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li>
                    <a class="profile-pic" href="#">
                        <img src="{{ asset('admin_panel/plugins/images/users/varun.jpg') }}" alt="user-img" width="36"
                            class="img-circle">
                        <span class="text-white font-medium">{{ Auth::user()->first_name }}</span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
