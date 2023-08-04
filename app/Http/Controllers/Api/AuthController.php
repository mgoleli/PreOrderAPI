<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){

        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);

        if($token) {
            return response()->json(['token' => $token]);
        }
    
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
