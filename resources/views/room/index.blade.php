@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
            data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="index.html">Start</a></span> <span>Pokoje</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Pokoje </h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Filtruj:</h3>
                    <form action="" method="GET">
                        <div class="fields">
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="type" id="" class="form-control" placeholder="Kategoria">
                                        <option value="" disabled selected>-- Rodzaj Pokoju --</option>
                                        @foreach ($roomTypes as $roomType)
                                            <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="sort" id="" class="form-control" placeholder="Kategoria">
                                        <option value="" disabled selected>-- Sortuj --</option>
                                        <option value="name_asc">Nazwa rosnąco</option>
                                        <option value="name_desc">Nazwa malejąco</option>
                                        <option value="price_asc">Cena rosnąco</option>
                                        <option value="price_desc">Cena malejąco</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkin_date" class="form-control" name="date_start"
                                    placeholder="Data rozpoczęcia">
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkin_date" class="form-control" name="date_end"
                                    placeholder="Data zakończenia">
                            </div>
                            <div class="form-group">
                                <div class="range-slider">
                                    <span>
                                        <input type="number" value="200" min="0" max="1200" name="price_from"/> - <input type="number"
                                            value="500" min="0" max="1200" name="price_to"/>
                                    </span>
                                    {{-- <input value="200" min="0" max="1200" step="50" type="range" />
                                    <input value="500" min="0" max="1200" step="50" type="range" /> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Szukaj" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($rooms as $room)
                    <div class="col-md-4 ftco-animate">
                        <div class="destination">
                            <a href="{{route('room.show', $room->slug)}}"
                                class="img img-2 d-flex justify-content-center align-items-center"
                                style="background-image: url({{$room->image}});">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="{{route('room.show', $room->slug)}}">{{$room->name}}</a></h3>
                                        <p class="rate">
                                            @for ($i = 0; $i <= 5; $i++) @if ($i <=(int)$room->rating_avg)
                                                <i class="icon-star"></i>
                                                @else
                                                <i class="icon-star-o"></i>
                                                @endif
                                                @endfor
                                                <span>{{$room->count_rating}} Ocen</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">${{$room->room_fee}}<br><small>/noc</small></span>
                                    </div>
                                </div>
                                <p>{{Str::words($room->description, 10)}}</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Miami, Fl</span>
                                    <span class="ml-auto"><a href="{{route('room.show', $room->slug)}}" class="{{$room->is_empty ? 'bg-danger' : ''}}">
                                        Rezerwuj
                                    </a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    {{ $rooms->links('room._paginate') }}
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')

@endsection
