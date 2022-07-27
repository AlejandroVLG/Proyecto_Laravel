<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- CREATE A NEW MESSAGE ------------------>//////////////
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
}
