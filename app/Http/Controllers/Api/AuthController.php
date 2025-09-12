<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Login via API
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return $this->respondWithToken($token);
    }

    // Logout
    public function logout(Request $request)
{
    $token = $request->token;

    if ($token) {
        auth()->guard('api')->setToken($token)->invalidate();
    }

    session()->forget('jwt_token'); // remove JWT from session

    return redirect('/login')->with('status', 'Logged out successfully.');
}


    // Refresh token
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    // Get logged-in user
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
