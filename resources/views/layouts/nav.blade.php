<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">el Mundo.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/" class="nav-link">Start</a></li>
                <li class="nav-item"><a href="/hotel" class="nav-link">Hotel</a></li>
                <li class="nav-item"><a href="/room" class="nav-link">Pokoje</a></li>
                <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Kontakt</a></li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbar" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Konto
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbar">
                            <a class="dropdown-item" href="#"><strong>{{ Auth::user()->name() }}</strong></a>
                            <a class="dropdown-item" href="{{ route('home') }}">Rezerwacje</a>
                            <a class="dropdown-item" href="{{ route('home.index') }}">Profil</a>
                            @hasrole('Admin')
                                <a class="dropdown-item" href="{{ route('admin.index') }}">Panel Administratora</a>
                            @endhasrole
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                Wyloguj się
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item cta">
                        <a class="nav-link " href="{{ route('login') }}">Zaloguj się</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
