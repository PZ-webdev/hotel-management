@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <a href="{{ route('admin.room.index') }}">
                        <i class="fas fa-arrow-alt-circle-left" aria-hidden="true"></i> </a>
                    Edycja pokoju
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
                    <form class="form-horizontal form-material" action="">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Nazwa Pokoju</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value=" {{ $room->name }}" placeholder="Nazwa Pokoju"
                                    class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Opis</label>
                            <div class="col-md-12 border-bottom p-0">
                                <textarea name="description" class="form-control p-0 border-0" id="" cols="30"
                                    rows="10">{{ $room->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Typ Pokoju</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <select name="room_type" class="form-control p-0 border-0" id="">
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ $room->room_type == $type->id ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Cena Pokoju</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="number" value="{{ $room->room_fee }}" placeholder="Cena Pokoju"
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Wynajęty</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select name="room_type" class="form-control p-0 border-0" id="">
                                            <option value="0" {{ $room->is_empty == 0 ? 'selected' : '' }}>
                                               Nie
                                            </option>
                                            <option value="1" {{ $room->is_empty == 1 ? 'selected' : '' }}>
                                                Tak
                                             </option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Zapisz</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
