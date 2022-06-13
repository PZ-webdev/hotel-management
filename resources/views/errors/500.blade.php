@extends('layouts.app')
@section('content')
    <link href="{{ asset('admin_panel/css/style.min.css') }}" rel="stylesheet">

    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="error-title text-danger">500</h1>
                <h3 class="text-uppercase error-subtitle">BŁĄD SERWERA !</h3>
                <p class="text-muted mt-4 mb-4">WYDAJE SIĘ, ŻE MAMY PROBLEM. SPRÓBUJ PONOWNIE !</p>
                <a href="javascript:history.back()"
                    class="btn btn-danger btn-rounded waves-effect waves-light mb-5 text-white">Powrót</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin_panel/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_panel/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(".preloader").fadeOut();
    </script>
@endsection
