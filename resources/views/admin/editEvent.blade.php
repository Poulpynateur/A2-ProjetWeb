<!-- Edit -->
<div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="editEvent-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editEvent-title">Édition d'événement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form id="edit-event">
            <div class="form-group">
                <input type="text" class="form-control" id="edit-event-name" name="name" required>
                <label class="form-text text-danger"></label>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" maxlength="1500" id="edit-event-description" name="description" required></textarea>
                <label class="form-text text-danger"></label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="edit-event-image" name="image" required>
                <label class="form-text text-danger"></label>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="edit-event-date"  name="date" required>
                <label class="form-text text-danger"></label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="edit-event-price" name="price" required>
                <label class="form-text text-danger"></label>
            </div>
            <div class="form-group">
                <select class="form-control" id="edit-event-id_campus" name="id_campus">
                    @foreach ($campuses as $campus)
                        <option value="{{ $campus->id }}"> {{ $campus->location }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="edit-event-id_repetition" name="id_repetition">
                    @foreach ($repetitions as $repetition)
                        <option value="{{ $repetition->id }}"> {{ $repetition->repetition }} </option>
                    @endforeach
                </select>
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-info" id="editEvent-function">Confirmer</button>
      </div>
    </div>
  </div>
</div>