<?php

namespace App\Http\Controllers;

use App\Message;
use App\Thread;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = "Messages";

        $threads = new Thread;

        $threadsLastMessages = $threads->threadsLastMessages();

        return view('messages.index', compact('page', 'threadsLastMessages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $message_to)
    {
        $request->validate([
            'message'  =>  'required|string',
        ]);

        $thread = new Thread;

        $newThread = $thread->makeNewThread($message_to);

        $message = new Message;

        $message->user_id = auth()->id();
        $message->message = $request->message;
        $message->message_to = $message_to;
        $message->thread_id = $newThread->id;

        $message->save() ? $response = ['code'=>200] : $response = ['code'=>400];

        // if( $response['code'] == 200 )
        // {
        //     $user_to = User::findOrFail($message->message_to);

        //     $user_to->notify( new NewMessage( $message ) );
        // }

        // return view('message.newMessage', compact('message'));

        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
