<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <span class="subheading">Oferta Spejalna</span>
                <h2 class="mb-4"><strong>Najpopularniejsze</strong> Pokoje</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach ($popularRooms as $room)
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('room.show', $room->slug) }}"
                            class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url({{ $room->image }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="{{ route('room.show', $room->slug) }}">{{ $room->name }}</a></h3>
                                    <p class="rate">
                                        @for ($i = 0; $i <= 5; $i++)
                                            @if ($i <= (int) $room->rating_avg)
                                                <i class="icon-star"></i>
                                            @else
                                                <i class="icon-star-o"></i>
                                            @endif
                                        @endfor
                                        <span>{{ $room->count_rating }} Ocen</span>
                                    </p>
                                </div>
                                <div class="two">
                                    <span class="price per-price">${{ $room->room_fee }}<br><small>/noc</small></span>
                                </div>
                            </div>
                            <p>{{ Str::words($room->description, 10) }}</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> Miami, Fl</span>
                                <span class="ml-auto"><a href="{{ route('room.show', $room->slug) }}"
                                        class="bg-success">
                                        Rezerwuj
                                    </a></span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
