@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="hero-wrap" style="background-image: url('{{ $room->image }}'); height:250px;">
        <div class="overlay"></div>
        <div class="container d-none">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="/">Start</a></span> <span class="mr-2"><a
                                href="{{ route('room.index') }}">Pokoje</a></span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        {{ $room->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="hotel-img"
                                        style="background-image: url({{ asset('images/hotel-1.jpg') }});"></div>
                                </div>
                                <div class="item">
                                    <div class="hotel-img"
                                        style="background-image: url({{ asset('images/hotel-2.jpg') }});"></div>
                                </div>
                                <div class="item">
                                    <div class="hotel-img"
                                        style="background-image: url({{ asset('images/hotel-3.jpg') }});"></div>
                                </div>
                                <div class="item">
                                    <div class="hotel-img"
                                        style="background-image: url({{ asset('images/hotel-4.jpg') }});"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single mt-2 mb-5 ftco-animate">
                            <h2>{{ $room->name }}</h2>
                            @if ($room->isEmpty($room))
                                <span class="text-danger text-bold">Pokoj obecnie jest w trakcie rezerwacji</span>
                            @endif
                            <p class="rate mb-5">
                                <span class="loc"><a href="#">
                                        <i class="icon-map"></i> [TAGI POKOJU]</a>
                                </span>
                                <span class="star">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-o"></i>
                                    8 Rating</span>

                            </p>
                            <div class="d-md-flex mt-5 mb-5" id="reservation">
                                {{ $room->description }}
                            </div>
                        </div>
                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-5">Sprawdź dostępność i rezerwację</h4>
                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_room" value="{{ $room->id }}">
                                <div class="fields">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    placeholder="Imię">
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    placeholder="Nazwisko">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="E-mail">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="address" value="{{ old('address') }}"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    placeholder="Adres">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="city" value="{{ old('city') }}"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    placeholder="Miasto">
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="phone" name="phone" value="{{ old('phone') }}"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Telefon">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" name="date_in" id="" value="{{ old('date_in') }}"
                                                    class="form-control @error('date_in') is-invalid @enderror"
                                                    placeholder="Data przybycia">
                                                @error('date_in')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" name="date_off" id="" value="{{ old('date_off') }}"
                                                    class="form-control @error('date_off') is-invalid @enderror"
                                                    placeholder="Data wymeldowania">
                                                @error('date_off')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Rezerwuj" class="btn btn-primary py-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($errors->any())
        <script>
            location.href = "#reservation";
        </script>
    @endif

    @include('layouts.footer')
@endsection
