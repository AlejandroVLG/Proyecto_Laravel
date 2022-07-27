<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ChannelController extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- CREATE A NEW CHANNEL ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function createChannel(Request $request)
    {
        try {
            Log::info("Creating a channel");

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'game_id' => ['required']
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

            $user = auth()->user()->id;

            $name = $request->input('name');
            $gameId = $request->input('game_id');

            $channel = new Channel();
            $channel->name = $name;
            $channel->game_id = $gameId;

            $channel->save();

            $channel->users()->attach($user);

            return response()->json(
                [
                    'success' => true,
                    'message' => "channel " . $name . " created"
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error("Error creating " . $name . ", " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error creating " . $name . " channel"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- SHOW ALL CHANNELS ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function showAllChannels()
    {
        try {

            Log::info("Getting all channels");

            $channels = Channel::query()->get()->toArray();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'channels retrieved successfully',
                    'data' => $channels
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error getting channels: " . $exception->getMessage());

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
    /////////<------------------- EDIT CHANNELS ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function editChannel(Request $request, $id)
    {
        try {
            Log::info('Updating Channel');

            $validator = Validator::make($request->all(), [
                'name' => ['string']
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
            
            $channel = Channel::query()->find($id);

            if (!$channel) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Channel doesn't exists"
                    ],
                    404
                );
            }

            $name = $request->input('name');

            if (isset($name)) {
                $channel->name = $name;
            };

            $channel->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "Channel " . $id . " changed"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error modifing the channel: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error modifing the channel"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////////<------------------- DELETE GAMES ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function deleteChannel($id)
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
