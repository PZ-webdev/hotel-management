@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('admin.reservation.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Edycja Rezerwacji
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.reservation.update', $reservation->id) }}" method="post">
                        @csrf
                        @method('PUT')
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
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    value="{{ $reservation->first_name }}" name="first_name">
                                                {{-- @error('first_name') --}}
                                                <span class="invalid-feedback is-invalid" role="alert">
                                                    <strong>message</strong>
                                                    {{-- </span> --}}
                                            </div>
                                            <div class="col-md-6"> <input type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    value="{{ $reservation->last_name }}" name="last_name">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail</th>
                                    <td> <input type="text" class="form-control" value="{{ $reservation->email }}"
                                            name="email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Telefon</th>
                                    <td> <input type="text" class="form-control" value="{{ $reservation->phone }}"
                                            name="phone"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Adres</th>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6"> <input type="text" class="form-control"
                                                    value="{{ $reservation->address }}" name="address"></div>
                                            <div class="col-md-6"> <input type="text" class="form-control"
                                                    value="{{ $reservation->city }}" name="city"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Data Wynajmu</th>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6"> <input type="date" class="form-control"
                                                    value="{{ $reservation->date_start }}" name="date_start"></div>
                                            <div class="col-md-6"> <input type="date" class="form-control"
                                                    value="{{ $reservation->date_end }}" name="date_end"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Pokój</th>
                                    <td>
                                        <select name="id_room" id="" class="form-control">
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}"
                                                    {{ $reservation->id_room == $room->id ? 'selected' : '' }}>
                                                    {{ $room->name }}</option>
                                            @endforeach
                                        </select>
                                </tr>
                                <tr>
                                    <th scope="row">Kod potwierdzenia</th>
                                    <td><input type="text" class="form-control"
                                            value="{{ $reservation->confirm_code }}" name="confirm_code" disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Potwierdzenie</th>
                                    <td> <input type="checkbox" id="confirm" class="form-check-input"
                                            {{ $reservation->verified_at != null ? 'checked' : '' }} name="verified_at"
                                            value="1">
                                        <label
                                            for="confirm">{{ $reservation->verified_at == null ? 'Potwierdź' : $reservation->verified_at }}</label>
                                    </td>
                                </tr>
                            </tbody>
                    </form>
                    </table>
                    <button class="btn btn-success">Zapisz</button>
                </div>
            </div>
        </div>
    </div>
@endsection
