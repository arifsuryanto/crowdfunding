<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\User;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdatePasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Email Not Found',
            ], 200);
        } else if ($user->email_verified_at == null) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Email Not Verified, Please Verify Your Email First !',
            ], 200);
        } else {
            $user->password = bcrypt($request->password);
            $user->update();

            return response()->json([
                'response_code' => '00',
                'response_message' => 'Password Changed Successfully!',
                'data' => $user,
            ]);
        }
    }
}
