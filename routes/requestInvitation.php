<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestInvitationController;
use App\Http\Controllers\UserConnectionController;
use Illuminate\Support\Facades\Route;


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

Route::post('/send-request', [RequestInvitationController::class, 'store']);
Route::get('/request-invitations/{slug}', [RequestInvitationController::class, 'index']);
Route::post('/delete-request', [RequestInvitationController::class, 'destroy']);
Route::post('/accept-request', [RequestInvitationController::class, 'edit']);
