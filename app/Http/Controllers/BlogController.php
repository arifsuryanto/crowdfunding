<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function random($count)
    {
        $blogs = Blog::select('*')
            ->inRandomOrder()
            ->limit($count)
            ->get();

        $data['blogs'] = $blogs;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Data blog berhasil ditampilkan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $blog->id . '.' . $extension;
            $image_folder = '/photos/blog/';
            $image_location = $image_folder . $filename;

            $data['blog'] = $blog;
            try {
                $file->move(public_path($image_folder), $filename);

                $blog->update([
                    'image' => $image_location,
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'response_code' => '01',
                    'response_message' => 'Foto blog gagal diupload',
                    'data' => $data
                ], 200);
            }


            return response()->json([
                'response_code' => '00',
                'response_message' => 'Data blog berhasil ditambahkan',
                'data' => $data
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
