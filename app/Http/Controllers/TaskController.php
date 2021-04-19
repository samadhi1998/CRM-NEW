<?php

namespace App\Http\Controllers;
use App\Notifications\TaskAdded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Models\Order;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct() {
        $this->authorizeResource(Task::class, Task::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Task::where('ServicePersonID','=', Auth::user()->EmpID)->sortable()->paginate(5);
        
        if(Auth::user()->roles->name == 'Super-Admin' || Auth::user()->can('add-task', App\Models\Task::class) ){
            $data = task::sortable()->paginate(5);
        }

        return view('task/viewtask',['tasks'=>$data])
        ->with('orders', Order::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($OrderID)
    {
        $user = User::where('RoleID','=',5)->get();
        $data = Order::find($OrderID);
        return view ('task/CreateTask',['orders'=>$data])
            ->with(['users'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $request->validate([
            'Description'=>'required|max:255|min:5',
            'Due_Date'=>'required',
            'ServicePersonID'=>'required'
            ]);

          $task=new Task;
          $task->Added_By = Auth::user()->EmpID;
          $task->Description=$request->Description;
          $task->Status=$request->Status;
          $task->Due_Date=$request->Due_Date;
          $task->ServicePersonID=$request->EmpID;

         $data = Order::find($request->input('OrderID'));
         $data->OrderID = $request->input('OrderID');

         $task->save();
         $data->task()->associate($task);

         $data->save();
       


        return redirect('/View-Task');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($TaskID)
    {
        $data = task::find($TaskID);
        return view('task.UpdateTask',['tasks'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = task::find($request->input('TaskID'));
        $data->TaskID = $request->input('TaskID');
        $data->ServicePersonID = $request->input('ServicePersonID');
        $data->Due_Date = $request->input('Due_Date');
        $data->Status = $request->input('Status');
        $data->Description = $request->input('Description');
        
        $data->save();

        return redirect('View-Task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function deleteTask($TaskID)
    {
        $data=task::find($TaskID);
        $data->delete();
        return redirect('View-Task');
    }

    public function searchTasks(Request $request)
    {

        $request->validate([
            'query'=>'required']);

        $query=$request->input('query') ;
        
        $task=task::where('Description', 'like', "%$query%")->orWhere('TaskID', 'like', "%$query%")->orWhere('Due_Date', 'like', "%$query%")->paginate(5);
        
        if (count($task)>0) {
            return view('task/searchTask', ['tasks'=>$task]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter available one ...');
        }
    
    }

    public function jointasks($TaskID)
    {
           $tasks = DB::table('tasks')
          ->join('orders','tasks.TaskID',"=",'orders.TaskID')
          ->join('users','tasks.Added_By','=','users.EmpID')
          ->select('tasks.TaskID','tasks.Description','tasks.Due_Date','tasks.Status','users.name','users.EmpID','users.MobileNo','users.email','orders.OrderID','tasks.created_at','orders.CustomerID')
          ->where('tasks.TaskID','=',$TaskID)
          ->get()->toArray();  

         
        
         return view('task.viewtaskinfo',['tasks'=>$tasks]);  
    }

    
    public function completeTask($TaskID)
    {
        $data=task::find($TaskID);
        $data->update(['Status' => 'Completed']);
        return redirect('View-Task');
    }

}
