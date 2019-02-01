{{-- Template for a normal event --}}
<div class="card m-2">
    <div class="row">
        <div class="col-md-12 col-xl-8">
            <div class="card-body">
                <h4 class="card-title">{{ $event->name }}</h4>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text">Prix d'entrée : {{ $event->price_participation }} €</p>
                <p class="card-text">Date : {{ $event->date }}</p>
              {{-- Conditions for registering to the event --}}
                @auth
                    @if(App\Models\Site\Register::isUserRegister($event->id))
                        <button type="button" class="btn btn-outline-primary btn-lg"onclick="unregisterEvent({{$event->id}}, this)">Se désinscrire</button>
                    @else
                        <button type="button" class="btn btn-primary btn-lg" onclick="registerEvent({{$event->id}}, this)">S'inscrire</button>
                    @endif
                @endauth
            </div>
        </div>
        <div class="col-md-12 col-xl-4 text-center">
            <img class="w-100" src="{{ $event->image }}" alt="{{ $event->name }}">
        </div>
    </div>
</div>