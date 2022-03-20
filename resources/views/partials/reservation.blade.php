<div class="hero-wrap" style="background-image: url('images/destination-5.jpg'); height:250px;"></div>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
            @if ($reservations->isEmpty())
                <span class="text-center"><h3>Brak rezerwacji</h3></span>
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
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>
                                        <a href="#" class="text-link">[{{$reservation->id_room}}]</a> - Nazwa pokoju
                                    </td>
                                    <td>{{$reservation->date_start}}</td>
                                    <td>{{$reservation->date_end}}</td>
                                    <td>12</td>
                                    <td>6734zł</td>
                                    <td><button class="btn btn-sm btn-info button-info"><i class="icon-info-circle"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
  </section>