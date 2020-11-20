<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetrieveProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->user()->email_verified_at == null) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Email Not Verified, Please Verify Your Email First !',
            ], 200);
        } else {
            return response()->json([
                'response_code' => '00',
                'response_message' => 'Profile Info',
                'data' => $request->user(),
            ]);
        }
    }
}
