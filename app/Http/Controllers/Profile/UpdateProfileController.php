<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profpic', $filename);

            $request->user()->name = $request->name;
            $request->user()->photo = $filename;
            $request->user()->update();

            return response()->json([
                'response_code' => '00',
                'response_message' => 'Profile Updated',
                'data' => $request->user(),
            ]);
        } else {
            /* return $request; */
            $request->user()->name = $request->name;
            $request->user()->update();

            return response()->json([
                'response_code' => '00',
                'response_message' => 'Profile Updated',
                'data' => $request->user(),
            ]);
        }
    }
}
