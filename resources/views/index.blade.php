@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    @include('partials.hero')

    {{-- @include('partials.services') --}}

    @include('partials.offers')

    @include('partials.testimony')

    @include('partials.blog-section')

    @include('layouts.footer')
@endsection
