@extends('layouts.template')

@section('content')

<div class="container mx-auto p-4 bg-light" style="height:100%">
    <div class="row">
        <div class="col-6">
            <h3>Dernières suggestions</h3>
        </div>
        <div class="col-6">
            {{-- Checks if the user is logged in. If not, he can't post a suggestion --}}
            @auth
                <button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#add-suggestion-form" aria-expanded="false" aria-controls="add-suggestion-form">
                    Proposer une idée
                </button>
            @endauth
        </div>
    </div>
    <div class="row">
        {{-- Checks if the user is logged in. If not, he can't post a suggestion (here are the details) --}}
        @auth
            <div class="card card-body collapse my-3" id="add-suggestion-form">
                <form id="add-suggestion">
                    <div class="form-group">
                        <label for="add-suggestion-name">Nom de l'événement</label>
                        <input type="text" class="form-control" name="name" maxlength="50" id="add-suggestion-name" required>
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="form-group">
                        <label for="add-suggestion-id_repetition">Récurrence</label>
                        <select class="form-control" id="add-suggestion-id_repetition" name="id_repetition">
                            @foreach ($repetitions as $repetition)
                                <option value="{{ $repetition->id }}"> {{ $repetition->repetition }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="add-suggestion-description">Description (1500 caractères)</label>
                        <textarea class="form-control" rows="3" maxlength="1500" name="description" id="add-suggestion-description" required></textarea>
                        <label class="form-text text-danger"></label>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" onclick="sendNewSuggestion()">Proposer !</button>
                </form>
            </div>
        @endauth
    </div>
    {{-- Displays the suggestions through a loop --}}
    @foreach ($bestVotes as $event)
    <div class="row">
        <div class="card m-2 w-100">
            <div class="card-header">
                <div class="row">
                    <h4 class="col m-0">{{$event->name}}</h4>
                    <cite class="col text-right px-5">Par {{$event->author->firstname.' '.$event->author->lastname}}</cite>
                    {{-- Allows the CESI employees to report a suggestion --}}
                    @if(Auth::check() && Auth::user()->role->name === 'Personnel CESI')
                        <button type="button" class="btn btn-outline-danger m-1 report-button" onclick="reportSuggestion({{$event->id}})" title="Signaler la suggestion">
                            <i class="fas fa-exclamation-triangle"></i>
                        </button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>{{$event->description}}</p>
                </blockquote>
                <div class="float-right">
                    <label class="text-secondary mx-2">{{$event->votedBy->count()}} vote(s)</label>
                    {{-- Checks if the user is logged in. If not, he can't like a suggestion --}}
                    @auth
                        @if(App\Models\User::haveVoteFor($event->id))
                            <button type="button" class="btn btn-outline-danger" onclick="unlikeSuggestion({{$event->id}}, this)"><i class="fas fa-heart-broken"></i></button>
                        @else
                            <button type="button" class="btn btn-outline-success" onclick="likeSuggestion({{$event->id}}, this)"><i class="far fa-heart"></i></button>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection