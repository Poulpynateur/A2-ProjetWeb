{{-- Template for the suggestions in admin part. The suggestion can be accepted, rejected, or edited --}}

@include('admin.editSuggestion')

<div class="card">
    <div class="card card-body">
        <table class="table table-striped" id="suggestion-list-dataTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Auteur</th>
                    <th>Campus</th>
                    <th>Répétition</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suggestions as $suggestion)
                <tr id="table-suggestion-row-{{$suggestion->id}}">
                    <td>
                        {{ $suggestion->name }}
                        @if($suggestion->id_Approbations == 11)
                        <p class="text-danger">Cette suggestion a été signalée</p>
                        @endif
                    </td>
                    <td>{{ $suggestion->description }}</td>
                    <td>{{ $suggestion->author->firstname.' '.$suggestion->author->lastname }}</td>
                    <td>{{ $suggestion->campus->location }}</td>
                    <td>{{ $suggestion->repetition->repetition }}</td>
                    <td class="float-right">
                        <button type="button" onclick="acceptSuggestion({{$suggestion->id}})" class="btn btn-outline-success m-1" title="Accepter la suggestion" data-toggle="modal" data-target="#editEvent">
                            <i class="fas fa-check"></i>
                        </button>
                        <button type="button" onclick="editModalSuggestion({{$suggestion->id}})" class="btn btn-outline-info m-1" data-toggle="modal" data-target="#editSuggestion">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" onclick="deleteModal('deleteSuggestion','{{$suggestion->name}}',{{$suggestion->id}})" class="btn btn-outline-danger m-1" data-toggle="modal" data-target="#delete-modal">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>