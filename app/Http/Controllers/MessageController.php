<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Message;
use App\Http\Requests;
use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index()
    {
        return Message::paginate(25);
    }

    public function create()
    {
        //
    }

    public function store(MessageRequest $request)
    {

        try {

            \App\Message::create($request->all());

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

    public function show(Message $message)
    {
        return $message;

        // $user = Auth::user();
        // $message = Message::findOrFail($id);
        //
        // $message->update(['unread' => 0]);
        //
        // $US = new \App\Services\UserService;
        //
        // return view('pages.messages.message', compact('user', 'mail', 'US'));

    }

    public function update(MessageRequest $request, Message $message)
    {

        try {

            $message->update($request->all());

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


    public function destroy(Message $message)
    {

        try {
            $message->delete();

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
