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

    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- SHOW GAMES BY ID ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function getAllGamesByUserId()
    {
        try {

            Log::info("Getting Games by User ID");

            $userId = auth()->user()->id;

            $games = User::query()->find($userId)->games;

            return response()->json(
                [
                    'success' => true,
                    'message' => 'games retrieved successfully',
                    'data' => $games
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error getting games: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error getting games"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- SHOW ALL GAMES ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function getAllGames()
    {
        try {

            Log::info("Getting all Games");

            $games = Game::query()->get()->toArray();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'games retrieved successfully',
                    'data' => $games
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error getting games: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error getting games"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- EDIT GAMES ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function editGame(Request $request, $id)
    {
        try {
            Log::info('Updating Game');

            $validator = Validator::make($request->all(), [
                'title' => ['string'],
                'game_url' => ['string']
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $validator->errors()
                    ],
                    400
                );
            }
            $userId = auth()->user()->id;

            $game = Game::query()->where('user_id', '=', $userId)->find($id);

            if (!$game) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Game doesn't exists"
                    ],
                    404
                );
            }

            $title = $request->input('title');
            $gameUrl = $request->input('game_url');

            if (isset($title)) {
                $game->title = $title;
            };

            if (isset($gameUrl)) {
                $game->game_url = $gameUrl;
            };

            $game->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "Game " . $id . " changed"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error modifing the game: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error modifing the game"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////////<------------------- DELETE GAMES ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function deleteGame($id)
    {
        try {
            Log::info('Deleting game');

            $game = Game::query()->find($id);

            if (!$game) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Game doesn't exists"
                    ],
                    404
                );
            }

            $game->delete($id);

            return response()->json(
                [
                    'success' => true,
                    'message' => "Game " . $id . " deleted"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error deleting the game: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error deleting the game"
                ],
                500
            );
        }
    }
    
}
