var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;
var base_url = window.location.origin;

function getRequests(mode) {

    $.ajax({
        url: base_url + "/request-invitations/" + mode,
        method: "get",
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {
            console.log(response);
            $("#content").removeClass("d-none");
            $("#content").html(response.requests);
            if (mode == "sent") {
                $("#sent_request_count").html("( " + response.sentRequestCount + " )");
            }
            else if (mode == "received") {
                $("#received_request_count").html("( " + response.getReceivedRequestCount + " )");
            }
        }
    });

}

function getMoreRequests(mode) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnections() {
    $.ajax({
        url: base_url + "/get-connection",
        method: "get",
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {
            console.log(response);
            $("#content").removeClass("d-none");
            $("#content").html(response.getConnection);

            $("#connection_count").html("( " + response.connectionCount + " )");

        }
    });
}

function getMoreConnections() {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getConnectionsInCommon(userId, connectionId) {

    $.ajax({
        url: base_url + "/get-connection-common",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            userId: userId,
            connectionId: connectionId
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {
            // getSuggestion();
            // $("#content").removeClass("d-none");
            $("#content_").html(response.connectionInCommon);
            // $("#get_suggestions_count").html("( " + response.suggestionCount + " )");

        }
    });
}

function getMoreConnectionsInCommon(userId, connectionId) {
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function getSuggestion(page) {

    $.ajax({
        url: base_url + "/get-suggestions/" + page,
        method: "get",
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {
            console.log(response);
            $("#content").removeClass("d-none");
            $("#content").html(response.suggestions);
            $("#get_suggestions_count").html("( " + response.suggestionCount + " )");
        }
    });
}

function getMoreSuggestions(page) {

    getSuggestion(page);
    // Optional: Depends on how you handle the "Load more"-Functionality
    // your code here...
}

function sendRequest(userId, suggestionId) {
    console.log(userId, suggestionId);

    $.ajax({
        url: base_url + "/send-request",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            userId: userId,
            suggestionId: suggestionId
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {
            getSuggestion();
            // $("#content").removeClass("d-none");
            // $("#content").html(response.suggestions);
            // $("#get_suggestions_count").html("( " + response.suggestionCount + " )");

        }
    });
}

function deleteRequest(userId, requestId) {

    $.ajax({
        url: base_url + "/delete-request",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            userId: userId,
            requestId: requestId
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {

            // getSuggestion();
            getRequests("sent");



        }
    });
}

function acceptRequest(userId, requestId) {
    $.ajax({
        url: base_url + "/accept-request",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            userId: userId,
            requestId: requestId
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {

            // getSuggestion();
            getRequests("received");


        }
    });
}

function removeConnection(id) {
    $.ajax({
        url: base_url + "/delete-connection/" + id,
        method: "get",
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (response) {
            getConnections();
        }
    });
}

$(function () {
    var page = 0;
    getSuggestion(page);
});
