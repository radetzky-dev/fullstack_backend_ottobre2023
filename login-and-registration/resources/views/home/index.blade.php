@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>Dashboard</h1>
            <p class="lead">Only authenticated users can access this section.</p>
            <p>Questo solo se sei loggato lo vedi</p>
            <img class="mb-4" src="{!! url('images/ok.png') !!}" alt="" width="300" height="300">

        @endauth

        @guest
            <h1>Homepage</h1>
            <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
            <p>Questa la vedi solo se NON sei loggato</p>
            <img class="mb-4" src="{!! url('images/nonok.png') !!}" alt="" width="300" height="300">
        @endguest


        <p class="display-4">Questa scritta la vedi sempre</p>
    </div>
@endsection
