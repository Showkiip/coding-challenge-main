<?php

use App\Models\RequestInvitation;
use Illuminate\Support\Facades\DB;
use Laravel\Sail\Console\PublishCommand;
use App\Models\UserConnection;

function getSuggestions()
{
    $suggestions =  DB::table('users')
        ->select('*')
        ->whereNotIn('users.id', (function ($query) {
            $query->from('request_invitations')
                ->select('received_invitation')
                ->where('request_invitations.sent_invitation', '=', auth()->user()->id)
                ->whereIn('request_invitations.received_invitation', (function ($query) {
                    $query->from('users')
                        ->select('id');
                }));
        }))
        ->whereNotIn('users.id', (function ($query) {
            $query->from('request_invitations')
                ->select('sent_invitation')
                ->where('request_invitations.received_invitation', '=', auth()->user()->id)
                ->whereIn('request_invitations.sent_invitation', (function ($query) {
                    $query->from('users')
                        ->select('id');
                }))
                ->whereNotIn('users.id', (function ($query) {
                    $query->from('user_connections')
                        ->select('user_id')
                        ->where('user_connections.user_connection_id', '=', auth()->user()->id)
                        ->whereIn('user_connections.user_id', (function ($query) {
                            $query->from('users')
                                ->select('id');
                        }));
                }))
                ->whereNotIn('users.id', (function ($query) {
                    $query->from('user_connections')
                        ->select('user_connection_id')
                        ->where('user_connections.user_id', '=', auth()->user()->id)
                        ->whereIn('user_connections.user_connection_id', (function ($query) {
                            $query->from('users')
                                ->select('id');
                        }));
                }));
        }))->where('users.id', '<>', auth()->user()->id);

    return $suggestions;
}

function getSendRequest()
{
    return RequestInvitation::where('sent_invitation',auth()->user()->id)->with('userSendInvitation','userReceievedInvitation')->get();
}
function getReceivedRequest()
{
    return RequestInvitation::where('received_invitation',auth()->user()->id)->with('userReceievedInvitation','userSendInvitation')->get();
}


function getConnection()
{
    return UserConnection::where('user_id',auth()->user()->id)->with('user')->get();
}

function getConnectionInCommon($id)
{
    return UserConnection::where('user_id',$id)->with('user')->get();
}
