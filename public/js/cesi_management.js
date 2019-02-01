function reportEvent(eventID) {
    apiAJAXSend('/events/'+eventID, {
        id_approbation: 12
    }, null,'PUT');
}

function reportSuggestion(eventID) {
    apiAJAXSend('/events/'+eventID, {
        id_approbation: 11
    }, null,'PUT');
}

function reportComment(id_User, id_Picture) {
    sendPostAjax('/reportComment', JSON.stringify({
        id_User: id_User,
        id_Picture: id_Picture,
        _token: CSRF_TOKEN
    }), null,'JSON', 'POST');
}

function reportPicture(pictureID) {
    apiAJAXSend('/pictures/'+pictureID, {},null, 'PATCH');
}

function getEventPictures(eventID) {
    window.location="/getPictures?_token="+CSRF_TOKEN+"&eventID="+eventID;
}