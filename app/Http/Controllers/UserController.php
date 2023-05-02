<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();//check if email from postman or frontend exists
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }

            $token = $user->createToken('my-app-token')->plainTextToken;//if the $user exists cretes token

           /*  $user->createToken('my-app-token') creates a new personal access token for the authenticated user with the name 'my-app-token'. The createToken() method generates a new token and associates it with the user, and returns a Laravel\Sanctum\NewAccessToken instance.
->plainTextToken is then called on the NewAccessToken instance to retrieve the plain-text value of the token. This plain-text token can be returned to the client as part of a JSON response, stored in a cookie or local storage, or used in subsequent requests to authenticate the user's identity.*/
            $response = [
                'user' => $user,
                'token' => $token
            ];

             return response($response, 201);
    }
}
