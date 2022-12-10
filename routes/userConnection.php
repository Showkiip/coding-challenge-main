<?php


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


Route::get('/get-connection', [UserConnectionController::class, 'index']);
Route::post('/get-connection-common', [UserConnectionController::class, 'show']);
Route::get('/delete-connection/{id}', [UserConnectionController::class, 'destroy']);
