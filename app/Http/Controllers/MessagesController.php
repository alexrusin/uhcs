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
}
