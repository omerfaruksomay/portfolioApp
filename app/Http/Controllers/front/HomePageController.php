<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Mail\SendEmailUsingGmail;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
    public function index(){
        $project=Project::all();
        $message = Message::all();

        return view('front.welcome')->with('projects',$project)->with('messages',$message);
    }
    public function showProjects($id){
        $project=Project::find($id);
        return response()->json($project);
    }

    public function postMessage(Request $request){
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email',
            'phoneNum'=>'required',
            'message'=>'required|min:20',
        ]);

        $details=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phoneNum'=>$request->phoneNum,
            'message'=>$request->message,
        ];

        Mail::to(request('email'))->send(new Contact($details));

        $message = new Message();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->phoneNum=$request->phoneNum;
        $message->message=$request->message;
        $message->save();
        return redirect('/#contact')->with('success','Message delivered');
    }
}
