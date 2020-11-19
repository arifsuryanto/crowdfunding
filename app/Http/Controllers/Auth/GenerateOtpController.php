<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GenerateOtpRequest;
use App\OtpCode;
use App\User;
use Carbon\Carbon;

class RegenerateOtpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GenerateOtpRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Email Not Registered',
            ], 200);
        } else {
            $now = Carbon::now();
            // add 5 mins to the current time
            $otpExpires = $now->addMinutes(5);
            $code = mt_rand(100000, 999999);

            $otp = OtpCode::updateOrCreate(
                ['user_id' => $user->id],
                ['code' => $code, 'valid_until' => $otpExpires]
            );

            return response()->json([
                'response_code' => '00',
                'response_message' => 'OTP Code Has Been Sent to Your Email!',
                'data' => $otp,
            ]);
        }
    }
}
