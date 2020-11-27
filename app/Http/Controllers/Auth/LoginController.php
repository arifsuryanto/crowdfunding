<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Auth\LoginRequest;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email atau Password tidak ditemukan'], 401);
        }

        $data['token'] = $token;
        $data['user'] = auth()->user();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Login Success!',
            'data' => $data,
            'token' => $token
        ]);
    }
}
