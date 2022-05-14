<!DOCTYPE html>
<html lang="PL">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Administratora - Hotel el Mundo.</title>

    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('panel_admin/plugins/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('admin_panel/plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('admin_panel/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    <link href="{{ asset('admin_panel/css/style.min.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css"> --}}

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        @include('admin.layouts.header')

        @include('admin.layouts.aside')

        <div class="page-wrapper">

            @yield('content')

            <footer class="footer text-center"> {{ date('Y') }} &copy;
                <a href="/"> {{ config('app.name') }} </a>
            </footer>

        </div>

    </div>
    {!! Html::script(asset('admin_panel/plugins/datatable/js/jquery.dataTables.min.js')) !!}
    {!! Html::script(asset('admin_panel/plugins/datatable/js/dataTables.bootstrap5.min.js')) !!}

    {!! Html::style(asset('admin_panel/plugins/datatable/css/dataTables.bootstrap5.min.css')) !!}
    {{-- <script src="{{ asset('admin_panel/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script> --}}
  
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin_panel/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_panel/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('admin_panel/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin_panel/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin_panel/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin_panel/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    {{-- <script src="{{ asset('admin_panel/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script> --}}
    {{-- <script
        src="{{ asset('admin_panel/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
    </script> --}}
    <script src="{{ asset('admin_panel/js/pages/dashboards/dashboard1.js') }}"></script>
    @yield('scripts')
</body>

</html>
