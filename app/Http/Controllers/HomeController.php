<?php

namespace App\Http\Controllers;

use App\Models\RequestInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function suggestion($page)
    {
        $suggestion = getSuggestions();
        $suggestionCount  = $suggestion->count();
        $suggestions = $suggestion->take($page + 10)->get();
        $models = view('components.suggestion', compact('suggestions'))->render();

        return response()->json(['suggestions' => $models, 'suggestionCount' => $suggestionCount]);
    }
}
