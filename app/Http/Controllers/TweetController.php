<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;
use App\Http\Requests;
use App\Http\Requests\TweetRequest;
use App\Http\Controllers\Controller;

class TweetController extends Controller
{

    public function index()
    {
        return Tweet::paginate(25);
    }

    public function create()
    {
        //
    }

    public function store(TweetRequest $request)
    {

        try {

            \App\Tweet::create($request->all());

            return response()->json([
                'errors' => 'false',
                'message' => 'The project has been added!'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'errors' => 'true',
                'message' => 'Something went wrong!'
            ]);

        }

    }

    public function show(Tweet $tweet)
    {
        return $tweet;
    }
    
    public function update(TweetRequest $request, Tweet $tweet)
    {

        try {

            $tweet->update($request->all());

            return response()->json([
                'errors' => 'false',
                'message' => 'The project has been updated!'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'errors' => 'true',
                'message' => 'Something went wrong!'
            ]);

        }

    }

    public function destroy(Tweet $tweet)
    {

        try {
            $tweet->delete();

            return response()->json([
                'errors' => 'false',
                'message' => 'The project has been deleted!'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'errors' => 'true',
                'message' => 'Something went wrong!'
            ]);

        }

    }
}
