<?php

namespace App\Http\Controllers;

use App\Models\UserConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $getConnection = getConnection();

            $connectionCount  = $getConnection->count();
            $models = view('components.connection',compact('getConnection'))->render();

            return response()->json(['getConnection' => $models, 'connectionCount' => $connectionCount]);

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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserConnection  $userConnection
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $connection  = UserConnection::where([['user_id' , $request->userId],['user_connection_id',$request->connectionId]])->first();
        if($connection){
            $connectionInCommon  = getConnectionInCommon($connection->user_connection_id);
            $models = view('components.connection_in_common',compact('connectionInCommon'))->render();
            return response()->json(['connectionInCommon' => $models]);
        }
        else
        {
            return response()->json(['error' => 'something wrong happened']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserConnection  $userConnection
     * @return \Illuminate\Http\Response
     */
    public function edit(UserConnection $userConnection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserConnection  $userConnection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserConnection $userConnection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserConnection  $userConnection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $connection  = UserConnection::find($id);
        $connection->delete();

        return response()->json(['success' => 'Connection deleted successfully']);

    }
}
