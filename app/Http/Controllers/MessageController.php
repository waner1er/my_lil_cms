<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
        public function index()
        {
            return view('message.index', [
                'messages' => Message::all(),
            ]);
        }

        public function create()
        {
            return view('message.create');
        }

        public function store(Request $request)
        {
            
            $message = new Message();
            $message->name = $request->name;
            $message->message = $request->message;
            $message->save();
            return redirect()->route('messages.index');
        }

}
