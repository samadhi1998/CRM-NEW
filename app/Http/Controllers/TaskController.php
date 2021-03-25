<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = task::all();
        return view('task/viewtask',['tasks'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('task/CreateTask')
            ->with('users',User::all())
            ->with('orders',Order::all())
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=new task;
        $task->Added_By = Auth::user()->EmpID;
        $task->Description=$request->Description;
        $task->Status=$request->Status;
        $task->Due_Date=$request->Due_Date;
        $task->ServicePersonID=$request->EmpID;
        $result=$task->save();
       /* if ($result) {
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"operation failed"];
        }*/
        // Order::create($request->TaskID());
        return redirect('/View-Task');

        // return view ('task/CreateTask')
        //     ->with('users',User::all())
        //     ->with('orders',Order::all())
        // ;
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
    public function destroy(Task $task)
    {
        //
    }
}
