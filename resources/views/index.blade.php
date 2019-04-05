@extends('canvas::layouts.app')

@section('title', 'Canvas')

@push('meta')
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ mix('favicon.ico', 'vendor/canvas') }}">
@endpush

@section('body')
    @include('canvas::components.nav.navbar')
    <main class="py-4">
        @yield('content')
    </main>
@endsection
