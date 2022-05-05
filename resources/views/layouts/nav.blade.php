<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">el Mundo.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Start</a></li>
                <li class="nav-item"><a href="/hotel" class="nav-link">Hotel</a></li>
                <li class="nav-item"><a href="/room" class="nav-link">Pokoje</a></li>
                <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">Kontakt</a></li>
                @guest
                    <li class="nav-item cta"><a href="/login" class="nav-link"><span>Zaloguj</span></a></li>
                @endguest
                @auth
                    <li class="nav-item cta"><a href="/" class="nav-link"><span>Wyloguj</span></a></li>
                    {{-- <form action="{{route('logout')}}" method="post">
                        @csrf
                     <li class="nav-item cta"><a href="#" onclick="this.form.submit()" class="nav-link"><span>Wyloguj</span></a></li>
                    </form> --}}
                @endauth
            </ul>
        </div>
    </div>
</nav>
