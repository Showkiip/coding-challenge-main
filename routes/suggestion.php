<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestInvitationController;
use App\Http\Controllers\UserConnectionController;
use Illuminate\Support\Facades\Route;
use Laravel\Ui\Presets\React;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get-suggestions/{page}', [HomeController::class, 'suggestion']);
