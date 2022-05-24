@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profil</h4>
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
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user"
                            src="{{ asset('admin_panel/plugins/images/large/img1.jpg') }}">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('admin_panel/plugins/images/users/2.jpg') }}"
                                        class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white mt-2">{{ Auth::user()->name() }}</h4>
                                <h5 class="text-white mt-2">{{ Auth::user()->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box mt-5 d-md-flex">
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>258</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>125</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <h1>556</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Imię i Nazwisko</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="{{ Auth::user()->name() }}" class="form-control p-0 border-0">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="example-email" class="col-md-12 p-0">Email</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="email" placeholder="{{ Auth::user()->email }}" class="form-control p-0 border-0"
                                        name="example-email" id="example-email">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Hasło</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="password" placeholder="Wprowadź hasło" class="form-control p-0 border-0">
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
            <!-- Column -->
        </div>

    </div>
@endsection
