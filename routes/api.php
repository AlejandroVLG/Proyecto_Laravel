<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {return ['Bienvenido a mi api'];});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(["middleware" => "jwt.auth"], function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/newGame', [GameController::class, 'createGame']);
    Route::get('/showGamesById', [GameController::class, 'getAllGamesByUserId']);
    Route::put('/editGame/{id}', [GameController::class, 'editGame']);
    Route::delete('/deleteGame/{id}', [GameController::class, 'deleteGame']);
    Route::get('/showGames', [GameController::class, 'getAllGames']);

    Route::post('/newChannel', [ChannelController::class, 'createChannel']);
    Route::get('/getChannel', [ChannelController::class, 'showAllChannels']);

    Route::post('/createMessage', [MessageController::class, 'createNewMessage']);
    Route::get('/showMessages', [MessageController::class, 'showAllMessages']);

});

Route::group(["middleware" => ["jwt.auth", "isSuperAdmin"]], function () {
    
    Route::post('/user/super_admin/{id}', [UserController::class, 'addSuperAdminRoleToUser']);
    Route::post('/user/super_admin_remove/{id}', [UserController::class, 'removeSuperAdminRoleToUser']);

    Route::put('/updateChannel/{id}', [ChannelController::class, 'editChannelById']);
    Route::delete('/deleteChannel/{id}', [ChannelController::class, 'deleteChannelById']);

});