/**
 * Show an alert message
 * @param {string} status bootstrap alert class, define the style
 * @param {string} message message to show
 */
function alertPopUp(status, message) {
    $('#alert').text(message);
    $('#alert').removeClass();
    $('#alert').addClass('alert alert-'+status);

    $('#alert').delay(3000).queue(function() {
        $('#alert').addClass("alert-hidden");
        $('#alert').dequeue();
    });
}

/**
 * Get all inputs values from a form
 * @param {string} id id of the target form
 * @returns {indexed array} array with name: values from form inputs
 */
function serializeForm(id) {
    var unindexed_array = $(id).serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

/**
 * Verify if inputs of a forms are valids
 * @param {*} formID id of the target form
 * @param {*} verification array [input name, error message, verification regex]
 * @returns {boolean} return if the verification fail
 */
function fieldsVerification(formID, verification) {
    var formFail;
    verification.forEach(element => {
        var inputID = formID+'-'+element[0];
        var regex = element[2];
        var errorMsg = element[1];

        var error = '';
        $(inputID).removeClass('is-invalid');

        if($(inputID).prop('required') && $(inputID).val() == '')
            error += 'Le champs doit être remplis. ';
    
        if($(inputID).val() != '' && !$(inputID).val().match(regex))
            error += errorMsg;

        if(error != '') {
            $(inputID).addClass('is-invalid');
            formFail = true;
        }
    
        $(inputID).next().text(error);
    });

    return formFail;
}