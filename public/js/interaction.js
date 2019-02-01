/**
 * Like a picture
 * Send a POST request to API
 * @param {int} pictureID like target
 * @param {DOM element} element origine button, swap style on success
 */
function likePicture(pictureID, element) {
    apiAJAXSend('/likes', {
        id_user: connected_user.id,
        id_picture: pictureID
    }, function() {
        $(element).removeClass('btn-outline-success').addClass('btn-outline-danger')
            .html('<i class="fas fa-heart-broken"></i>')
            .attr("onclick","unlikePicture("+pictureID+",this)");
    },
    'POST');
}
/**
 * Unlike a picture
 * Send a DELETE request to API
 * @param {int} pictureID unlike target
 * @param {DOM element} element origine button, swap style on success
 */
function unlikePicture(pictureID, element) {
    apiAJAXDelete('/likes/users/'+connected_user.id+'/pictures/'+pictureID, function() {
        $(element).addClass('btn-outline-success').removeClass('btn-outline-danger')
            .html('<i class="far fa-heart"></i>')
            .attr("onclick","likePicture("+pictureID+",this)");
    });
}
/**
 * Like a suggestion
 * Send a POST request to API
 * @param {int} eventID like target
 * @param {DOM element} element origine button, swap style on success
 */
function likeSuggestion(eventID, element) {
    apiAJAXSend('/votes', {
        id_user: connected_user.id,
        id_event: eventID
    }, function() {
        $(element).removeClass('btn-outline-success').addClass('btn-outline-danger')
            .html('<i class="fas fa-heart-broken"></i>')
            .attr("onclick","unregisterEvent("+eventID+",this)");
    },
    'POST');
}
/**
 * Unlike a suggestion
 * Send a DELETE request to API
 * @param {int} eventID unlike target
 * @param {DOM element} element origine button, swap style on success
 */
function unlikeSuggestion(eventID, element) {
    apiAJAXDelete('/votes/users/'+connected_user.id+'/events/'+eventID, function() {
        $(element).addClass('btn-outline-success').removeClass('btn-outline-danger')
            .html('<i class="far fa-heart"></i>')
            .attr("onclick","registerEvent("+eventID+",this)");
    });
}

/**
 * Register to event
 * Send a POST request to API
 * @param {int} eventID register target
 * @param {DOM element} element origine button, swap style on success
 */
function registerEvent(eventID, element) {
    apiAJAXSend('/registers', {
        id_user: connected_user.id,
        id_event: eventID
    }, function() {
        $(element).addClass('btn-outline-primary').removeClass('btn-primary')
            .text('Se desinscrire')
            .attr("onclick","unregisterEvent("+eventID+",this)");
    },
    'POST');
}
/**
 * Unregister to event
 * Send a DELETE request to API
 * @param {int} eventID unregister target
 * @param {DOM element} element origine button, swap style on success
 */
function unregisterEvent(eventID, element) {
    apiAJAXDelete('/registers/users/'+connected_user.id+'/events/'+eventID, function() {
        $(element).removeClass('btn-outline-primary').addClass('btn-primary')
            .text('S\'inscrire')
            .attr("onclick","registerEvent("+eventID+",this)");
    });
}
/**
 * Send a suggestion
 * Suggestion is a event, we fill dummy data for unused fields
 */
function sendNewSuggestion() {
    var formData = serializeForm("#add-suggestion");
    formData.id_campus = connected_user.id_campus;
    formData.image = '0';
    formData.id_user = connected_user.id;
    formData.date = '1970-1-1';
    formData.price = '0';
    formData.approved = '';

    console.log(formData);

    var verification = [
        ['name','Pas de caractères spéciaux.','^[_A-z0-9]*((-|\\s)*[_A-z0-9])*$'],
        ['description','required','']
    ];

    if(!fieldsVerification('#add-suggestion', verification)) {
        apiAJAXSend('/events', formData, null,'POST');
        $("#add-suggestion").trigger("reset");
    }
}

/**
 * Upload a picture on the server
 * @param {DOM ID} modalID modal to get data from
 * @param {DOM ID} pathTargetID show the path in a input on success
 */
function uploadPicture(modalID, pathTargetID) {
    var form = new FormData($('#'+modalID+'-form')[0]);
    sendPostAjax(
        '/uploadPicture',
        form,
        function(response) {
            $('#'+modalID).modal('toggle');
            if(pathTargetID)
                $('#'+pathTargetID).val(response.path);
        },
        false);
}
/**
 * Prepare upload picture modal
 * @param {*} target set data-target attribute
 * @param {int} eventID target event
 */
function setUploadPictureModal(target, eventID) {
    $('#upload-picture-ok').attr('data-target', target);
    $('#upload-picture-form-id_event').val(eventID);
}

/**
 * Send a comment
 * /!\ Use POST on laravel server
 * @param {int} pictureID 
 */
function sendComment(pictureID) {
    var data = {
        _token: CSRF_TOKEN,
        comment: $('#picture-comment-'+pictureID).val(),
        id_picture: pictureID,
    };
    sendPostAjax(
        '/sendComment',
        JSON.stringify(data),
        function() {
            $('#picture-comment-'+pictureID).val('');
            $('#picture-comment-button-'+pictureID).remove();
        },
        'JSON');
}

/**
 * Delete a item from the cart
 * /!\ Use DELETE on laravel server
 * @param {int} id_order 
 * @param {int} id_goodie 
 */
function deleteCartItem(id_order, id_goodie) {
    sendDELETEAjax(
        '/users/'+connected_user.id+'/orders/'+id_order+'/goodies/'+id_goodie,
        function() {
            location.reload();
        }
    );
}

/**
 * Check if user have already click on OK to accept the non-utilisation of cookies
 */
function acceptCookie() {
    $('#cookies').addClass('cookies-hidden');

    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "cookies=ok;" + expires + ";path=/";
}
$(document).ready(function() {
    if(document.cookie.match(/^(.*;)?\s*cookies\s*=\s*[^;]+(.*)?$/))
        $('#cookies').addClass('d-none');
});