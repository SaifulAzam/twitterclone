<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['store', 'update', 'destroy']]);
    }

    public function index()
    {
        return User::paginate(25);
    }

    public function store(UserRequest $request)
    {

        try {

            User::create($request->all());

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

    public function show(User $user)
    {
        return $user;
    }

    public function update(UserRequest $request, User $user)
    {

        try {

            $user->update($request->all());

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

    public function destroy(User $user)
    {
        try {
            $user->delete();

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

    public function followers($id)
    {
        return User::findOrFail($id)->followers();
    }

    public function following($id)
    {
        return User::findOrFail($id)->following();
    }

    public function tweets($id)
    {
        return User::findOrFail($id)->tweets();
    }

    public function retweets($id)
    {
        return User::findOrFail($id)->retweets();
    }

    public function newsfeed($id)
    {
        return User::findOrFail($id)->newsfeed();
    }

}
