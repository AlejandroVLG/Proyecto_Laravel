<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /////////////////////////////////////////////////////////////////////////////////
    ///////////<------------------- EDIT MY PROFILE ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function editMyProfile(Request $request, $id)
    {
        try {
            Log::info('Updating User');

            $validator = Validator::make($request->all(), [
                'name' => ['string','max:255'],
                'steam_name' => ['string'],
                'email' => ['string','email','max:255','unique:users'],
                'password' => ['string','min:6']
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

            $user = User::query()->where('id', '=', $userId)->find($id);

            if (!$user) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "User doesn't exists"
                    ],
                    404
                );
            }

            $name = $request->input('name');
            $steamName = $request->input('steam_name');
            $email = $request->input('email');
            $password = $request->input('password');

            if (isset($name)) {
                $user->name = $name;
            };

            if (isset($steamName)) {
                $user->steam_name = $steamName;
            };
            if (isset($email)) {
                $user->email = $email;
            };

            if (isset($password)) {
                $user->password = $password;
            };

            $user->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "User " . $userId . " changed"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error modifing User data: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error modifing User data"
                ],
                500
            );
        }
    }

    const ROLE_SUPER_ADMIN = 3;

    /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- ADD SUPER ADMIN ROLE ----------------->////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function addSuperAdminRoleToUser($id)
    {
        try {

            $user = User::find($id);

            $user->roles()->attach(self::ROLE_SUPER_ADMIN);

            return response()->json(
                [
                    'success' => true,
                    'message' => "Super admin role added to user"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error updating super_admin role to user: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error adding super_admin role to user"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////<----------------- REMOVE SUPER ADMIN ROLE ---------------->////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function removeSuperAdminRoleToUser($id)
    {
        try {

            $user = User::find($id);

            $user->roles()->detach(self::ROLE_SUPER_ADMIN);

            return response()->json(
                [
                    'success' => true,
                    'message' => "Super admin role removed to user"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error removing super_admin role to user: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Super admin role removed to user"
                ],
                500
            );
        }
    }
}
