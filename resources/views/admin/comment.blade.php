{{-- Template for the comment administration --}}

@include('admin.editComment')

<div class="card">
    <div class="card card-body">
        <table class="table table-striped" id="comment-list-dataTable">
            <thead>
                <tr>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th>Commentaire de l'image</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr id="table-comment-row-{{$comment->id_Users.$comment->id_Pictures}}">
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->author->firstname.' '.$comment->author->lastname }}</td>
                    <td>{{ $comment->picture->link }}</td>
                    <td>
                        @if($comment->date == '1970-01-01')
                        <p class="text-danger">Ce commentaire a été signalé</p>
                        @else
                        {{ $comment->date }}
                        @endif
                    </td>
                    <td class="float-right">
                        <button type="button" onclick="editModalComment('{{$comment->id_Users.$comment->id_Pictures}}')" class="btn btn-outline-info m-1" data-toggle="modal" data-target="#editComment">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" onclick="deleteModal('deleteComment','le commentaire de {{ $comment->author->firstname.' '.$comment->author->lastname }}','{{$comment->id_Users.$comment->id_Pictures}}')" class="btn btn-outline-danger m-1" data-toggle="modal" data-target="#delete-modal">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>