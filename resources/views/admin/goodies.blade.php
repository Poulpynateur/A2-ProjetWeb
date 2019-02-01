{{-- Template for the goodie admin part --}}

@include('admin.editGoodie')

<div class="card">
    
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#adminAddGoodie" aria-expanded="false" aria-controls="adminAddGoodie">
        Ajouter un goodie
    </button>

    <div class="collapse" id="adminAddGoodie">
        <div class="card card-body">
            <form id="add-goodie">
                <div class="form-group">
                    <label for="add-goodie-name">Nom du goodie</label>
                    <input type="text" class="form-control" name="name" maxlength="50" id="add-goodie-name" required>
                    <label class="form-text text-danger"></label>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="add-goodie-image">Image d'illustration</label>
                        <input type="text" class="form-control" name="image" id="add-goodie-image" placeholder="http://">
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="col-6">
                        <label for="add-goodie-image-upload">Charger une image sur le serveur</label>
                        <button id="add-goodie-image-upload" onclick="setUploadPictureModal('add-goodie-image','')" type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#upload-picture">
                            Charger une image
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-goodie-description">Description (255 caractères)</label>
                    <textarea class="form-control" rows="3" maxlength="255" name="description" id="add-goodie-description" required></textarea>
                    <label class="form-text text-danger"></label>
                </div>
                <div class="form-group">
                    <label for="add-goodie-id_category">Catégorie</label>
                    <select class="form-control" id="add-goodie-id_category" name="id_category">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}"> {{ $categorie->category }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-goodie-price">Prix du goodie</label>
                    <input type="text" class="form-control" name="price" id="add-goodie-price" required>
                    <label class="form-text text-danger"></label>
                </div>
                <div class="form-group">
                    <label for="add-goodie-stock">Nombre en stock</label>
                    <input type="text" class="form-control" name="stock" id="add-goodie-stock" required>
                    <label class="form-text text-danger"></label>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="sendNewGoodie()">Créer le goodie !</button>
            </form>
        </div>
    </div>

    <div class="card card-body">
        <table class="display" id="goodie-list-dataTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Stock</th>
                    <th>Nombre de commandes</th>
                    <th>Catégorie</th>
                    <th>Campus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($goodies as $goodie)
                <tr id="table-goodie-row-{{$goodie->id}}">
                    <td>{{ $goodie->name }}</td>
                    <td>{{ $goodie->price }}</td>
                    <td>{{ $goodie->description }}</td>
                    <td>{{ $goodie->image }}</td>
                    <td>{{ $goodie->stock }}</td>
                    <td>{{ $goodie->total_orders }}</td>
                    <td>{{ $goodie->category->category }}</td>
                    <td>{{ $goodie->campus->location }}</td>
                    <td class="float-right">
                        <button type="button" onclick="editModalGoodie({{$goodie->id}})" class="btn btn-outline-info m-1" data-toggle="modal" data-target="#editGoodie">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button onclick="deleteModal('deleteGoodie','{{$goodie->name}}',{{$goodie->id}})" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete-modal">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>