<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
    	$messages = Message::latest()->paginate(10);

    	return view('messages.index', compact('messages'));

    }

    public function delete(Message $message) 
    {
    	try {
    		$message->delete();
    		request()->session()->flash('alert-success', 'Message have been deleted');
    	} catch (\Exception $e) {
    		\Log::error($e);
    		request()->session()->flash('alert-danger', 'There was an error deleting message');
    	}
    	return redirect()->route('messages');
    }
}
