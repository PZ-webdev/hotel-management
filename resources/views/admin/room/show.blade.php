@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('admin.reservation.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Szczegóły Rezerwacji
                </h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="{{ route('admin.index') }}" class="fw-normal">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3>ID Rezerwacji: {{ $room->id }} </h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dane</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Nazwa Pokoju</th>
                                <td>{{ $room->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Opis</th>
                                <td>{{ $room->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Cena Pokoju</th>
                                <td>{{ $room->room_fee }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
