<!-- Edit -->
<div class="modal fade" id="editGoodie" tabindex="-1" role="dialog" aria-labelledby="editGoodie-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editGoodie-title">Édition de goodie</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <form id="edit-goodie">
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-goodie-name" name="name" required>
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-goodie-price" name="price" title="Prix" required>
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" maxlength="1500" id="edit-goodie-description" name="description" required></textarea>
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-goodie-image" name="image" required>
                        <label class="form-text text-danger"></label>
                    </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="edit-goodie-stock" name="stock" title="Stock" required>
                        <label class="form-text text-danger"></label>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="edit-goodie-id_campus" name="id_campus">
                            @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}"> {{ $campus->location }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="edit-goodie-id_category" name="id_category">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}"> {{ $categorie->category }} </option>
                            @endforeach
                        </select>
                    </div>
                </form>
      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-info" id="editGoodie-function">Confirmer</button>
            </div>
        </div>
    </div>
</div>