{{-- Template for the images of a past event --}}

{{-- If a user is a CESI employee, he can strike the photos --}}
@if(Auth::check() && Auth::user()->role->name === 'Personnel CESI')
<button type="button" class="btn btn-outline-danger m-1 report-button" onclick="reportPicture({{$picture->id}})" title="Signaler l'image">
    <i class="fas fa-exclamation-triangle"></i>
</button>
@endif
<img class="d-block w-100" src="{{$picture->link}}" alt="Image de {{$pastEvent->name}}">
@auth
<div class="my-2">
    <div class="row">
        <div class="col">
            {{-- Conditions for the like/dislike buttons --}}
            @if(App\Models\Site\Like::haveUserLike($picture->id))
            <button type="button" class="btn btn-outline-danger btn-lg btn-block" onclick="unlikePicture({{$picture->id}},this)"><i class="fas fa-heart-broken"></i></button>
            @else
            <button type="button" class="btn btn-outline-success btn-lg btn-block" onclick="likePicture({{$picture->id}},this)"><i class="far fa-heart"></i></button>
            @endif
        </div>
    </div>
    <div class="row my-2">
        <div class="col">
            {{-- Conditions for posting a comment --}}
            @if(App\Models\Site\Comment::haveUserComment($picture->id))
            <textarea class="form-control" id="picture-comment-{{$picture->id}}" rows="2" placeholder="Ajouter un commentaire"></textarea>
            <button type="button" id="picture-comment-button-{{$picture->id}}" class="btn btn-primary float-right mt-1" onclick="sendComment({{$picture->id}})">Envoyer</button>
            @endif
        </div>
    </div>
    {{-- Getting every comment on a photo --}}
    @foreach (App\Models\Site\Comment::getPictureComments($picture->id) as $comment)
    @if($comment->date != '1970-01-01')
    <div class="row mt-2">
        <div class="col">
            <div class="card">
              <div class="card-header">
                    {{ $comment->author->firstname.' '.$comment->author->lastname }}
                    {{-- Strike for employees --}}
                    @if(Auth::user()->role->name === 'Personnel CESI')
                    <button type="button" class="btn btn-outline-danger m-1 report-button" onclick="reportComment({{$comment->id_Users}},{{$comment->id_Pictures}})" title="Signaler le commentaire">
                        <i class="fas fa-exclamation-triangle"></i>
                    </button>
                    @endif
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>{{$comment->content}}</p>
                  <footer class="blockquote-footer">{{$comment->date}}</footer>
                </blockquote>
              </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endauth