<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkEntryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('user/{id}', 'GetUserController');
Route::post('user', 'CreateUserController');
Route::put('user/{id}', 'UpdateUserController');
Route::delete('user/{id}', 'DeleteUserController');

Route::get('workEntry/{id}', 'GetWorkEntryController');
Route::get('workEntry/{id}', 'GetByUserIdWorkEntryController');
Route::post('workEntry', 'CreateWorkEntryController');
Route::put('workEntry/{id}', 'UpdateWorkEntryController');
Route::delete('workEntry/{id}', 'DeleteWorkEntryController');
