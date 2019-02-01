<!-- Edit -->
<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="editComment-title" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editComment-title">Édition de commentaire</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<form id="edit-comment">
					<div class="form-group">
						<textarea class="form-control" rows="3" id="edit-comment-content" name="content" required></textarea>
						<label class="form-text text-danger"></label>
					</div>
				</form>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
				<button type="button" class="btn btn-info" id="editComment-function">Confirmer</button>
			</div>
		</div>
	</div>
</div>