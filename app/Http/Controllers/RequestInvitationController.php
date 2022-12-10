<?php

namespace App\Http\Controllers;

use App\Models\RequestInvitation;
use App\Models\UserConnection;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Psr\Http\Message\RequestInterface;

class RequestInvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mode)
    {

        if ($mode == "sent") {
            $requests  = getSendRequest();
            $sentRequestCount = $requests->count();
            $models = view('components.request', compact('requests', 'mode'))->render();
            return response()->json(['requests' => $models, 'sentRequestCount' => $sentRequestCount]);
        } else if($mode = "received") {
            $requests  = getReceivedRequest();
            $getReceivedRequestCount = $requests->count();
            $models = view('components.request', compact('requests', 'mode'))->render();
            return response()->json(['requests' => $models, 'getReceivedRequestCount' => $getReceivedRequestCount]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sentRequest  = new RequestInvitation();
        $sentRequest->sent_invitation = $request->userId;
        $sentRequest->received_invitation = $request->suggestionId;
        $sentRequest->save();


        // $suggestions = getSuggestions();
        // $suggestionCount  = $suggestions->count();
        // $models = view('components.suggestion', compact('suggestions'))->render();


        return response()->json(['success' => 'Send Request Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestInvitation  $requestInvitation
     * @return \Illuminate\Http\Response
     */
    public function show(RequestInvitation $requestInvitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestInvitation  $requestInvitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $requests  = RequestInvitation::where([['sent_invitation', $request->userId], ['received_invitation', $request->requestId]])->first();
        if ($requests) {
            $connect = new UserConnection;
            $connect->user_id = $request->userId;
            $connect->user_connection_id = $request->requestId;
            $connect->save();
            $requests->delete();
            return response()->json(['success' => 'Accepted the request ']);
        }
        else
        {
            return response()->json(['error'=>'something is wrong with the request']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestInvitation  $requestInvitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestInvitation $requestInvitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestInvitation  $requestInvitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request  = RequestInvitation::where([['sent_invitation', $request->userId], ['received_invitation', $request->requestId]])->first();
        $request->delete();
        return response()->json(['success' => true]);
    }
}
