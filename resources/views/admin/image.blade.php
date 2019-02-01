{{-- Template for the images download --}}

<div class="card">
    <div class="card card-body">
        <table class="table table-striped" id="pictures-list-dataTable">
            <thead>
                <tr>
                    <th>Nom de l'événement</th>
                    <th>Auteur</th>
                    <th>Lien</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pictures as $picture)
                <tr id="table-picture-row-{{$picture->id}}">
                    <td>{{ $picture->event->name }}</td>
                    <td>{{ $picture->postedBy->email }}</td>
                    <td>
                        @if(preg_match('/\w*reported\b/', $picture->link))
                            <p class="text-danger">Cette image a été signalée</p>
                        @else
                            {{ $picture->link }}
                        @endif
                    </td>
                    <td class="float-right">
                        <button type="button" class="btn btn-outline-danger m-1" onclick="deletePicture({{$picture->id}})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>