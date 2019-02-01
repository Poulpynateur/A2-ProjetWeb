@extends('layouts.template')

{{-- Includes the CSS files --}}
@push('head')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
    <link href="{{ asset('css/events.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="home-main">
        <h1 class="home-main-title py-5">Bienvenue au BDE du CESI</h1>
        {{-- Checks if there is a Top Event, then displays it --}}
        @if($topEvent)
            @include('events.topEvent')
        @endif


        <h2 class="home-secondary-titles my-5">Les incontournables de la boutique</h2>

        <div class="container-fluid">
            <div class="row mb-3">
                {{-- Searches among the products and prompts the 3 most sold ones --}}
                @foreach ($bestSellers as $bestSeller)
                    <div class="col-sm-12 col-lg-6 col-xl-4 mt-3">
                    @include('shop.bestSeller')
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-inline-block w-100 mb-4">
            <a role="button" class="btn btn-primary btn-lg btn-block py-2" href={{ route('Boutique') }}>Visiter la boutique</a>
        </div>
    </div>
@endsection