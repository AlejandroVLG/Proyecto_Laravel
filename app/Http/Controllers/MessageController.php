<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- CREATE A NEW MESSAGE ------------------>////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function createNewMessage(Request $request)
    {
        try {
            Log::info("Creating a new message");

            $validator = Validator::make($request->all(), [
                'message' => ['required', 'string'],
                'channel_id' => ['required']
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
            $userId = auth()->user()->id;

            $messageText = $request->input('message');
            $channelId = $request->input('channel_id');

            $message = new Message();
            $message->message = $messageText;
            $message->channel_id = $channelId;
            $message->user_id = $userId;

            $message->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "message sended"
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error("Error creating the new message" . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error creating new message"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- SHOW ALL MESSAGES ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function showAllMessages()
    {
        try {

            Log::info("Getting all Messages");

            $userId = auth()->user()->id;

            $message = Message::query()->where('user_id', '=', $userId)->get()->toArray();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'message retrieved successfully',
                    'data' => $message
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error getting messages: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error getting messages"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    ///////////<------------------- EDIT MESSAGE BY ID ------------------>////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function editMessageById(Request $request, $id)
    {
        try {
            Log::info('Changing Messages');

            $validator = Validator::make($request->all(), [
                'message' => ['string'],
                'channel_id' => ['integer']
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

            $message = Message::query()->where('user_id', '=', $userId)->find($id);

            if (!$message) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Message doesn't exists"
                    ],
                    404
                );
            }

            $messageText = $request->input('message');
            $channelId = $request->input('channel_id');

            if (isset($messageText)) {
                $message->message = $messageText;
            };

            if (isset($channelId)) {
                $message->channel_id = $channelId;
            };

            $message->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "Message changed"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error modifing the message: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error modifing the message"
                ],
                500
            );
        }
    }
    
    /////////////////////////////////////////////////////////////////////////////////
    /////////////<------------------- DELETE MESSAGE ------------------>/////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function deleteMessage($id)
    {
        try {
            Log::info('Deleting message');

            $message = Message::query()->find($id);

            if (!$message) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Message doesn't exists"
                    ],
                    404
                );
            }

            $message->delete($id);

            return response()->json(
                [
                    'success' => true,
                    'message' => "Message " . $id . " deleted"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error deleting the message: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error deleting the message"
                ],
                500
            );
        }
    }
}
