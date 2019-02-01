<!-- Edit -->
<div class="modal fade" id="editSuggestion" tabindex="-1" role="dialog" aria-labelledby="editSuggestion-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSuggestion-title">Édition de suggestion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form id="edit-suggestion">
                <div class="form-group">
                    <input type="text" class="form-control" id="edit-suggestion-name" name="name" required>
                    <label class="form-text text-danger"></label>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" maxlength="1500" id="edit-suggestion-description" name="description" required></textarea>
                    <label class="form-text text-danger"></label>
                </div>
                <div class="form-group">
                    <select class="form-control" id="edit-suggestion-id_repetition" name="id_repetition">
                        @foreach ($repetitions as $repetition)
                            <option value="{{ $repetition->id }}"> {{ $repetition->repetition }} </option>
                        @endforeach
                    </select>
                </div>
            </form>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-info" id="editSuggestion-function">Confirmer</button>
        </div>
      </div>
    </div>
</div>