@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12">
                <h2 class="h4">Zaloguj się</h2>
            </div>
            <p>Uzyskaj dostęp do danych rezerwacji</p>
        </div>
        <div class="row block-9">
            <div class="col-md-6 pr-md-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Login">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Hasło">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Pamiętaj mnie
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Zapomniałeś hasła ?
                        </a>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Zaloguj
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{asset('images/about.jpg')}}" alt="" srcset="" class="img img-fluid">
            </div>
        </div>
    </div>
</section>
@endsection
