<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Action\ResponseProtocol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use WpOrg\Requests\Response;
use Laravel\Sanctum\PersonalAccessToken;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::with('address')->get();
        return ResponseProtocol::success($user);
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            return ResponseProtocol::success($user->createToken('API Token')->plainTextToken, 'User login successfully');

        } catch (\Throwable $th) {
            //throw $th;
            return ResponseProtocol::failed($th->getMessage(), 'User login failed');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'phone' => 'required|numeric|min:10',
                'first_name' => 'required|string|min:3|max:255',
                'last_name' => 'required|string|min:3|max:255',
            ]);

            //start db transaction
            DB::beginTransaction();

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);

            //commit db transaction
            DB::commit();

            return ResponseProtocol::success($user->createToken('API Token')->plainTextToken, 'User created successfully');
        } catch (\Throwable $th) {
            //rollback db transaction
            DB::rollBack();
            //throw $th;
            return ResponseProtocol::failed($th->getMessage(), 'User creation failed');
        }
    }
    public function logout(Request $request)
    {
        try {
            // Get the token from the Authorization header
            $token = $request->bearerToken();

            if (!$token) {
                return ResponseProtocol::failed([], 'Token not provided');
            }

            // Find the token in the database
            $accessToken = PersonalAccessToken::findToken($token);

            if (!$accessToken) {
                return ResponseProtocol::failed([], 'Invalid token');
            }

            // Delete the token
            $accessToken->delete();

            return ResponseProtocol::success([], 'User logged out successfully');
        } catch (\Throwable $th) {
            return ResponseProtocol::failed($th->getMessage(), 'Logout failed');
        }
    }

    public function issLogin(Request $request)
    {
        try {
            // Get the token from the Authorization header
            $token = $request->bearerToken();

            if (!$token) {
                return ResponseProtocol::failed([], 'Token not provided');
            }

            // Find the token in the database
            $accessToken = PersonalAccessToken::findToken($token);

            if (!$accessToken) {
                return ResponseProtocol::failed([], 'Invalid token');
            }

            // Get the associated user
            $user = $accessToken->tokenable;

            if ($user) {
                return ResponseProtocol::success($user, 'User is logged in');
            }

            return ResponseProtocol::failed([], 'User is not logged in');
        } catch (\Throwable $th) {
            return ResponseProtocol::failed($th->getMessage(), 'User is not logged in');
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        //
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
