<div class="my-2 shadow  text-white bg-dark p-1" id="">
    <div class="row d-flex justify-content-between">

        @foreach ($requests as $request)
            @if ($mode == 'sent')
                <div class="col-md-8">
                    <table class="ms-1">
                        <td class="align-middle">{{ $request->userReceievedInvitation->name ?? ' ' }}</td>
                        <td class="align-middle"> - </td>
                        <td class="align-middle">{{ $request->userReceievedInvitation->email ?? ' ' }}</td>
                        <td class="align-middle">
                    </table>
                </div>
                <div class="col-md-4 mt-3" style="text-align:right">

                    <button id="cancel_request_btn_" class="btn btn-danger me-1"
                        onclick="deleteRequest('{{ $request->sent_invitation }}','{{ $request->received_invitation }}')">Withdraw
                        Request</button>

                </div>
            @elseif($mode == 'received')
                <div class="col-md-8">
                    <table class="ms-1">
                        <td class="align-middle">{{ $request->userSendInvitation->name }}</td>
                        <td class="align-middle"> - </td>
                        <td class="align-middle">{{ $request->userSendInvitation->email }}</td>
                        <td class="align-middle">
                    </table>
                </div>
                <div class="col-md-4 mt-3" style="text-align:right">
                    <button id="accept_request_btn_" class="btn btn-primary me-1"
                        onclick="acceptRequest('{{ $request->sent_invitation }}','{{ $request->received_invitation }}')">Accept</button>
                </div>
            @endif
        @endforeach
    </div>
</div>
