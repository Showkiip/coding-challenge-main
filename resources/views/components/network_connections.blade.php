@php
    $suggestions = getSuggestions();
    $getSendRequest = getSendRequest();
    $getReceivedRequest = getReceivedRequest();
    $getConnection = getConnection();
@endphp

<div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card shadow  text-white bg-dark">
            <div class="card-header">Coding Challenge - Network connections</div>
            <div class="card-body">
                <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1" id="get_suggestions_btn"
                        onclick="getSuggestion()">Suggestions <span id="get_suggestions_count">(
                            {{ $suggestions->count() }})</span></label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2" id="get_sent_requests_btn"
                        onclick="getRequests('sent')">Sent Requests
                        <span id="sent_request_count"> ( {{ $getSendRequest->count() }} )</span></label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio3" id="get_received_requests_btn"
                        onclick="getRequests('received')">Received
                        Requests <span id="received_request_count">( {{ $getReceivedRequest->count() }} )</span></label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio4" id="get_connections_btn"
                        onclick="getConnections()">Connections
                        <span id="connection_count">( {{ $getConnection->count() }} )</span></label>
                </div>
                <hr>
                <div id="content" class="d-none">

                </div>


            </div>
        </div>
    </div>

</div>

{{-- Remove this when you start working, just to show you the different components --}}

<div id="connections_in_common_skeleton" class=" d-none">
    <br>
    <span class="fw-bold text-white">Loading Skeletons</span>
    <div class="px-2">
        @for ($i = 0; $i < 10; $i++)
            <x-skeleton />
        @endfor
    </div>
</div>
