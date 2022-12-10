<div class="my-2 shadow text-white bg-dark p-1" id="">
    <div class=" row d-flex justify-content-between">

        @forelse ($getConnection as $item)
            @php

                $getConnectionInCommon = getConnectionInCommon($item->user_connection_id);
            @endphp
            <div class="col-md-8">
                <table class="ms-1">
                    <td class="align-middle">{{ $item->user->name }}</td>
                    <td class="align-middle"> - </td>
                    <td class="align-middle">{{ $item->user->email }}</td>
                    <td class="align-middle">
                </table>

            </div>
            <div class="col-md-4 mt-3" style="text-align:right">
                <button style="width: 220px" id="get_connections_in_common_" class="btn btn-primary" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapse_" aria-expanded="false"
                    aria-controls="collapseExample"
                    onclick="getConnectionsInCommon('{{ $item->user_id }}','{{ $item->user_connection_id }}')">
                    Connections in common ({{ $getConnectionInCommon->count() }})
                </button>
                <button id="create_request_btn_" class="btn btn-danger me-1"
                    onclick="removeConnection('{{ $item->id }}')">Remove Connection</button>
            </div>
        @empty
        @endforelse

    </div>

    <div class="collapse" id="collapse_">
        <div id="content_" class="p-2">

            {{-- <x-connection_in_common /> --}}
        </div>
        <div id="connections_in_common_skeletons_">
            {{-- Paste the loading skeletons here via Jquery before the ajax to get the connections in common --}}
        </div>
    </div>
    <div class="d-flex justify-content-center w-100 py-2 d-none" >
        <button class="btn btn-sm btn-primary" id="load_more_connections_in_common_">Load
            more</button>
    </div>
</div>
