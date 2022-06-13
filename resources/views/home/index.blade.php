@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="hero-wrap" style="background-image: url('images/destination-5.jpg'); height:250px;"></div>

    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Edytuj Profil</h3>

            <form method="POST" action="{{ route('home.update', Auth::id()) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">Imię</label>
                    <input type="text" class="form-control" name="first_name" placeholder="Imię"
                        value="{{ Auth::user()->first_name }}" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Nazwisko</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Nazwisko"
                        value="{{ Auth::user()->last_name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        value="{{ Auth::user()->email }}" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Hasło</label>
                    <input type="password" class="form-control" name="password" placeholder="Hasło">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Powtórz Hasło</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Powtórz Hasło">
                </div>

                <button type="submit" class="btn btn-success">Zapisz</button>
            </form>

        </div>
    </section>

    @include('layouts.footer')
@endsection
