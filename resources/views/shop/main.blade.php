@extends('layouts.template')

@section('content')
@push('head')
<link href="{{ asset('css/shop.css') }}" rel="stylesheet">
<script src="{{ asset('js/shop.js') }}" defer></script>
@endpush

<div class="row w-100 h-100">
    @include('shop.filter')
    <div class="col-md-10 col-sm-12 h-100 p-0" id="shop-best-sellers">
        <h1 class="text-center mt-3">Meilleurs articles</h1>
        <div class="row mb-3 mx-3">
            {{-- Displays the 3 most sold articles --}}
            @foreach ($bestSellers as $bestSeller)
                <div class="col-sm-12 col-lg-6 col-xl-4 mt-3">
                @include('shop.bestSeller')
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-10 col-sm-12 h-100 p-0 d-none" id="shop-search-result">
        {{-- Shows every article in a loop, packed on a line of 4 articles only --}}
        @foreach ($goodies->chunk(4) as $chunk)
            <div class="card-deck mx-3">
                @foreach($chunk as $goodie)
                    @include('shop.product')
                @endforeach 
            </div>
        @endforeach 
    </div>
</div>
@endsection