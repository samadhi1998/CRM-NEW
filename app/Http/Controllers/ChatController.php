<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message ;

use Pusher\Pusher;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        //$users=User::where('EmpID','!=', Auth::id())->get();

        // count how many message are unread from the selected user
        $users = DB::select("select users.EmpID, users.name, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.EmpID = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.EmpID != " . Auth::id() . " 
        group by users.EmpID, users.name, users.email");
        

        return view('message.chat', ['users'=>$users]);
    }

    public function getMessage($user_id){
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        $messages = Message::where(function ($query) use ($user_id , $my_id){
            $query->where('from',$my_id)->where('to',$user_id);
        })->orWhere(
            function ($query) use ($user_id , $my_id) {
               $query->where('from' ,$user_id )->where('to' ,$my_id );
        })->get();

        return view('message.index' , ['messages' => $messages] );
        
    }

    public function sentMessage(Request $request){
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;
        
        

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0;
        
        // $user=User::find($request->input('EmpID'));
        // $data->User()->associate($user);

        $data->save();

        //pusher
        $options =array(
            'cluster' => 'ap2',
            'userTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);

        
        
    }
     
}
