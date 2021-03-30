<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\product;
use App\Models\Task;
use App\Models\customer;
use App\Models\Notification;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('index');
        $orders= Order::all();
        $products= Product::all();
        $cutomers= Customer::all();
        $notifications = Notification::all();
        $count = Order::whereDate('created_at',Carbon::today())->count();
        $count2 = Customer::whereDate('created_at',Carbon::today())->count();
        $count3 = Task::whereDate('Due_Date',Carbon::today())->count();
        $count4 = Product::where('Status','=','In Stock')->count();
        $notifications = auth()->user()->unreadNotifications;

        return view('admin.dashboard',compact('count','count2','count3','count4'))
        ->with('orders', $orders)
        ->with('customers',$cutomers)
        ->with('products',$products);
    }

    public function markNotification(Request $request)
    {
        
        $user = Auth::user();
      
        $notification = $user->unreadNotifications->where('id')->first();
        
        $notification->markAsRead();
        

        return redirect()->back();
    }

    public function markAllNotification(Request $request)
    {
        
        $user = Auth::user();
      
        $notification = $user->unreadNotifications;
        
        $notification->markAsRead();
        

        return redirect()->back();
    }

}
