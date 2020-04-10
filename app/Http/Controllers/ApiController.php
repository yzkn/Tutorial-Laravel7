<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    function login() {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());

        $credentials = request(['email', 'password']);

        if (! $token = auth("api")->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());

        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());

        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());

        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());
        Log::debug('$token: '.$token);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }
}
