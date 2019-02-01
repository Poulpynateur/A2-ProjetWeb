{{-- Template for the Event of the Month --}}
<div class="container-fluid">
    <div class="jumbotron mx-2 my-5 p-0">
        <div class="row">
            <div class="col-sm-12 col-xl-4 text-center">
                <img src="{{ $topEvent->image }}" alt="{{ $topEvent->name }}" style="width:100%">
            </div>
            <div class="col-sm-12 col-xl-8 p-5">
                <div class="row">
                    <div class="col"><h1 class="display-4">{{ $topEvent->name }}</h1></div>
                    <div class="col text-right mr-2">
                        <p class="lead m-0">{{ $topEvent->price_participation }} €</p>
                        <p class="lead m-0">{{ $topEvent->date }}</p>
                    </div>
                </div>
                <hr class="my-4">
                <p>{{ $topEvent->description }}</p>
                {{-- Checks if the user is authentified. If so, he can register to an event --}}
                @auth
                    @if(App\Models\Site\Register::isUserRegister($topEvent->id))
                        <button type="button" class="btn btn-outline-primary btn-lg" onclick="unregisterEvent({{$topEvent->id}}, this)">Se désinscrire</button>
                    @else
                        <button type="button" class="btn btn-primary btn-lg" onclick="registerEvent({{$topEvent->id}}, this)">S'inscrire</button>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>