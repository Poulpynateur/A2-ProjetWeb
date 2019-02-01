{{-- Template for a past event --}}
<div class="card mt-2">
    <div class="card-body row d-flex flex-column mx-1">
        <h5 class="card-title">{{ $pastEvent->name }}</h5>
        {{-- Strike for emplyees --}}
        @if(Auth::check() && Auth::user()->role->name === 'Personnel CESI')
        <button type="button" class="btn btn-outline-danger m-1 report-button" onclick="reportEvent({{$pastEvent->id}})" title="Signaler l'événement">
            <i class="fas fa-exclamation-triangle"></i>
        </button>
        @endif
        <h6 class="card-subtitle mb-2 text-muted">{{ $pastEvent->date }}</h6>
        <p class="card-text pastEventDescription">{{ $pastEvent->description }}</p>

        <div class="mt-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPastEvent{{ $pastEvent->id }}">En savoir plus</button>
            {{-- If the user was registered to the event, he can post images --}}
            @if(Auth::check() && App\Models\Site\Register::isUserRegister($pastEvent->id))
                <button type="button" class="btn btn-outline-primary" onclick="setUploadPictureModal(false,'{{$pastEvent->id}}')"  data-toggle="modal" data-target="#upload-picture">Poster une image</button>
            @endif
            {{-- Strike --}}
            @if(Auth::check() && Auth::user()->role->name === 'Personnel CESI')
            <button type="button" onclick="getEventPictures({{$pastEvent->id}})" class="btn btn-outline-dark">Télécharger les images</button>
            @endif
        </div>
    </div>
</div>

{{-- Modal for the images and comments --}}
<div class="modal fade" id="modalPastEvent{{ $pastEvent->id }}" tabindex="-1" role="dialog" aria-labelledby="modalPastEvent{{ $pastEvent->id }}Title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalPastEvent{{ $pastEvent->id }}Title">{{ $pastEvent->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row w-100 mx-auto">
                        <div id="carouselEventPicture{{ $pastEvent->id }}" class="carousel slide w-100" data-interval="false" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ $pastEvent->image }}" alt="Image de présentation {{ $pastEvent->name }}">
                                </div>
                                @foreach (App\Models\Site\Picture::getEventPictures($pastEvent->id) as $picture)
                                    <div class="carousel-item">
                                        @include('events.pastImages')
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselEventPicture{{ $pastEvent->id }}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselEventPicture{{ $pastEvent->id }}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Suivant</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>