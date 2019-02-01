/**** Datatable library ****/
/* Administration goodies table */
var dataTableGoodie = $('#goodie-list-dataTable').DataTable({
    columnDefs: [
        {"targets": 8,
        "searchable": false},
        {"targets": 8,
        "orderable": false}
    ]
});
/* Administration events table */
var dataTableEvent = $('#event-list-dataTable').DataTable({
    columnDefs: [
        {"targets": [10],
        "searchable": false},
        {"targets": [10],
        "orderable": false}
    ]
});
/* Administration suggestions table */
var dataTableSuggestion = $('#suggestion-list-dataTable').DataTable({
    columnDefs: [
        {"targets": 5,
        "searchable": false},
        {"targets": 5,
        "orderable": false}
    ]
});
/* Administration comments table */
var dataTableComment = $('#comment-list-dataTable').DataTable({
    columnDefs: [
        {"targets": 4,
        "searchable": false},
        {"targets": 4,
        "orderable": false}
    ]
});
/* Administration pictures table */
var dataTablePicture = $('#pictures-list-dataTable').DataTable({
    columnDefs: [
        {"targets": 3,
        "searchable": false},
        {"targets": 3,
        "orderable": false}
    ]
});

/**
 * Get data from the form, verify and send it with ajax
 */
function sendNewEvent() {
    var formData = serializeForm("#add-event");
    formData.id_campus = connected_user.id_campus;
    formData.id_user = connected_user.id;
    formData.approved = 'approved';

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['date','required',''],
        ['image','required',''],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+']
    ];

    if(!fieldsVerification('#add-event', verification)) {
        apiAJAXSend('/events', formData, null,'POST');
        $("#add-event").trigger("reset");
    }
}

/**
 * Get data from the form, verify and send it with ajax
 */
function sendNewGoodie() {
    var formData = serializeForm("#add-goodie");
    formData.id_campus = connected_user.id_campus;

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required',''],
        ['image','required',''],
        ['price',' Le prix doit être un nombre.','[+-]?([0-9]*[.])?[0-9]+'],
        ['stock',' Le stock doit être un entier.','[0-9]*']
    ];

    if(!fieldsVerification('#add-goodie', verification)) {
        apiAJAXSend('/goodies', formData, null,'POST');
        $("#add-goodie").trigger("reset");
    }
}

function getRegisterList(eventID, fileFormat) {
    window.location="/getRegisterList?_token="+CSRF_TOKEN+"&eventID="+eventID+"&fileFormat="+fileFormat;
}

/**
 * Show a delete modal
 * @param {int} typeID indiquate type (goodie, event, ...)
 * @param {string} objectName Name of the row
 * @param {int} objectID ID of the targeted row
 */
function deleteModal(typeID , rowName, rowID) {
    $('#delete-modal-name').text(rowName);
    $('#delete-modal-function').attr("onclick",typeID+"("+rowID+")");
}

/**
 * Send a DELETE by Ajax to delete a event
 * Remove the datatable row on success
 * @param {int} eventID 
 */
function deleteEvent(eventID) {
    apiAJAXDelete('/events/'+eventID, function() {
        dataTableEvent.row($('#table-event-row-'+eventID)).remove().draw();
    });
}
/**
 * Send a DELETE by Ajax to delete a suggestion
 * Remove the datatable row on success
 * @param {int} suggestionID 
 */
function deleteSuggestion(suggestionID) {
    apiAJAXDelete('/events/'+suggestionID, function() {
        dataTableSuggestion.row($('#table-suggestion-row-'+suggestionID)).remove().draw();
    });
}
/**
 * Send a DELETE by Ajax to delete a goodie
 * Remove the datatable row on success
 * @param {int} goodieID 
 */
function deleteGoodie(goodieID) {
    apiAJAXDelete('/goodies/'+goodieID, function() {
        dataTableGoodie.row($('#table-goodie-row-'+goodieID)).remove().draw();
    });
}
/**
 * Send a DELETE by Ajax to delete a picture
 * Remove the datatable row on success
 * @param {int} pictureID 
 */
function deletePicture(pictureID) {
    apiAJAXDelete('/pictures/'+pictureID, function() {
        dataTablePicture.row($('#table-picture-row-'+pictureID)).remove().draw();
    });
}

/**
 * Send a DELETE by Ajax to delete a comment
 * /!\ the delete request is send to laravel server
 * Remove the datatable row on success
 * @param {string} id_comment concat from id_user and id_picture
 */
function deleteComment(id_comment) {
    var commentID = id_comment.toString();
    sendDELETEAjax(
        '/users/'+parseInt(commentID.charAt(0))+'/pictures/'+parseInt(commentID.charAt(1)),
        function() {
            dataTableComment.row($('#table-comment-row-'+commentID)).remove().draw();
        }
    );
}

/**
 * Add category from input
 * Send POST to API
 */
function addCategory() {
    var content = $('#add-category-name').val();
    apiAJAXSend('/categories', {category: content}, function() {
        location.reload();
    },'POST');
}
/**
 * Delete category from input
 * Send DELETE to API
 */
function deleteCategory() {
    var categoryID = $('#delete-category-id_category').val();
    apiAJAXDelete('/categories/'+categoryID, function() {
        location.reload();
    });
}