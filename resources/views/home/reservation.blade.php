<div class="hero-wrap" style="background-image: url('images/destination-5.jpg'); height:250px;"></div>

<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
        @if ($reservations->isEmpty())
            <span class="text-center">
                <h3>Brak rezerwacji</h3>
            </span>
        @else
            <h3 class="mb-3">Twoje Rezerwację</h3>
            <div class="row d-flex mb-5 contact-info">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pokój</th>
                            <th scope="col">Data Rozpoczęcia</th>
                            <th scope="col">Data Zakończenia</th>
                            <th scope="col">Suma dni</th>
                            <th scope="col">Opłata</th>
                            <th>Szczegóły</th>
                            <th>Potwierdzenie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="home/reservation/{{ $reservation->id_room }}"
                                        class="text-link">[{{ $reservation->id_room }}]</a> -
                                    {{ $reservation->rooms->name }}
                                </td>
                                <td>{{ $reservation->date_start }}</td>
                                <td>{{ $reservation->date_end }}</td>
                                <td>{{ $price = $reservation->dateDiffInDays($reservation->date_start, $reservation->date_end) }}
                                </td>
                                <td>{{ $reservation->payment($reservation->rooms->room_fee, $price) }}zł
                                </td>
                                <td><button class="btn btn-sm btn-info button-info btn-submit"
                                        data-id="{{ $reservation->id }}" data-toggle="modal"
                                        data-target="#exampleModal"><i class="icon-info-circle"></i></button></td>
                                @if ($reservation->verified_at == null)
                                    <td>
                                        <a href="{{ route('reservation.confirm.auth', $reservation->id) }}"
                                            class="btn btn-sm btn-warning button-info">
                                            <i class="ion-ios-checkmark"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>

@section('scripts')
    <script>
        $(".btn-submit").click(function(e) {
            e.preventDefault();

            let id = $(this).data("id");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('reservation.details') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    $('.__name').text(data.data.name);
                    $('.__address').text(data.data.address);
                    $('.__city').text(data.data.city);
                    $('.__phone').text(data.data.phone);
                    $('.__verified_at').text(data.data.verified_at);

                    $("#modalDetails").modal('show');
                }
            });

        });
    </script>
@endsection

@include('vendor.details-modal')
