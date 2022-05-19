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
                    <h3>ID Rezerwacji: {{ $reservation->id }} </h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dane</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Imie i Nazwisko</th>
                                <td>{{ $reservation->first_name . ' ' . $reservation->last_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail</th>
                                <td>{{ $reservation->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Telefon</th>
                                <td>{{ $reservation->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Adres</th>
                                <td>{{ $reservation->address . ' - ' . $reservation->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Data Wynajmu</th>
                                <td>{{ $reservation->date_start . ' - ' . $reservation->date_end }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kod potwierdzenia</th>
                                <td>{{ $reservation->confirm_code }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Potwierdzenie</th>
                                <td>{{ $reservation->verified_at == null ? '---' : $reservation->verified_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
