<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use \App\Models\Message;

class Dashboard extends Controller
{
    public function index(){
        $message = Message::all();
        return view('back.dashboard')->with('messages',$message);
    }

}
