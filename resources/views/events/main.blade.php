@extends('layouts.template')

    @section('content')
    
    <div class="container text-center my-4">
        <a href="#event-in-run" class="text-dark lead">Événements en cours</a>
        <a href="#event-past-run" class="text-dark lead ml-3">Événements passés</a>
    </div>
    
    @if($topEvent)
        @include('events.topEvent')
    @endif
    
    {{-- Displays in a loop 2 events on a line --}}
    <hr class="mx-4"/>
    <h2 class="text-center my-4 display-4" id="event-in-run">Événements en cours</h2>
    @foreach ($events->chunk(2) as $chunk)
        <div class="container-fluid px-4">
            <div class="card-deck">
            @foreach($chunk as $event)
                @include('events.event')
            @endforeach
            </div>
        </div>
    @endforeach
    
    <hr class="mx-4"/>
    <h2 class="text-center my-4 display-4" id="event-past-run">Événements passés</h2>
    
    {{-- Displays in a loop 4 events on a line --}}
    @foreach ($pastEvents->chunk(4) as $chunk)
        <div class="container-fluid mb-5 px-4">
            <div class="card-deck">
            @foreach($chunk as $pastEvent)
                @include('events.pastEvent')
            @endforeach
            </div>
        </div>
    @endforeach

@endsection