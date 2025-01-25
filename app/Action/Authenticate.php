<?php
namespace App\Action;
use Laravel\Sanctum\PersonalAccessToken;


class Authenticate{
    public static function issLogin($request){
        try {
            // Get the token from the Authorization header
            $token = $request->bearerToken();

            if (!$token) {
                return false;
            }

            // Find the token in the database
            $accessToken = PersonalAccessToken::findToken($token);

            if (!$accessToken) {
                return false;
            }

            // Get the associated user
            $user = $accessToken->tokenable;

            if ($user) {
                return $user;
            }

            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }
}