<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- CREATE A NEW GAME ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function createGame(Request $request)
    {
        try {
            Log::info("Creating a game");

            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string'],
                'game_url' => ['required', 'string']
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => $validator->errors()
                    ],
                    400
                );
            };

            $title = $request->input('title');
            $gameUrl = $request->input('game_url');
            $userId = auth()->user()->id;

            $game = new Game();
            $game->title = $title;
            $game->game_url = $gameUrl;
            $game->user_id = $userId;

            $game->save();


            return response()->json(
                [
                    'success' => true,
                    'message' => "game " . $title . " created"
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error("Error creating " . $title . ", " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error creating the game " . $title
                ],
                500
            );
        }
    }

    
}
