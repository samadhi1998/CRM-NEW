<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('views: admin.users.index');
        //return view('index');
        $users= User::all();
        return view('admin.users.index')->with('users', $users)
        ->with('roles',role::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($EmpID)
    {
        $data = user::find($EmpID);
        return view('admin.users.updateuser',['users'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = user::find($request->input('EmpID'));
        $data->Added_By = Auth::user()->EmpID;
        $data->EmpID = $request->input('EmpID');
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->Address = $request->input('Address');
        $data->MobileNo = $request->input('MobileNo');
        $data->Status = $request->input('Status');
        
        
        $data->save();

        return redirect('/viewuser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($EmpID)
    {
        $data=user::find($EmpID);
        $data->delete();
        return redirect('/home');
    }

    public function assigntask(){
        $users= User::all();
        return view('task.AssignTask')->with('users', $users);
    }

    public function assignRole($EmpID){

        $data = user::find($EmpID);
        return view('admin.users.assignrole',['users'=>$data])
        ->with('roles',role::all());
    }

    public function addrole(Request $request, User $user){

        $data = user::find($request->input('EmpID'));
        $data->EmpID = $request->input('EmpID');
        $role = $request->input('RoleID');
        $data->roles()->associate($role);

        $data->save();

        return redirect('/viewuser');

    }

    public function joinroles(User $user)
    {
        // return DB::table('orders')->get();
          return DB::table('roles')
          ->join('users','users.RoleID',"=",'roles.RoleID')
          ->select('roles.*')
          ->where('users.RoleID',1)
          ->get();   
    }

}
