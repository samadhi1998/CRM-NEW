<?php
namespace App\Http\Controllers;

use Notifynder;
use App\Models\User;
use App\Models\Notification;
use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Log;

class NotificationsController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Note::class, Note::class);
    }
    /**
     * Mark a notification read
     * @param Request $request
     * @return mixed
     */
    public function markRead(Request $request)
    {
        $user = auth()->user();
	    $user->unreadNotifications()->where('EmpID', $request->EmpID)->first()->markAsRead();

        return redirect($user->notifications->where('EmpID', $request->EmpID)->first()->data['url']);
    }

    /**
     * Mark all notifications as read
     * @return mixed
     */
    public function markAll()
    {
        $user = User::find(\Auth::EmpID());
    
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }

    public function index(Request $request)
    {   
        $notification = Notification::all();

        //dd($notification);
        return view('notification/index',['notifications'=>$notification]);
    }
}
