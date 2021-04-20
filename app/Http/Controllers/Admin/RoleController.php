<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\Priviledge;
use App\Models\role_priviledges;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, Role::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = role::sortable()->paginate(5);
        return view('admin.users.viewrole',['roles'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin/users/createrole');
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
            'name'=>'required|min:2|max:25'
          ]);

        $role=new role;
        $role->name = $request->name;

        $result=$role->save();

        return redirect('/View-Role')->with('success','Role Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function roleedit($RoleID)
    {
        $data = role::find($RoleID);
        return view('admin.users.editrole',['roles'=>$data])
        ->with('priviledges',Priviledge::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function roleupdate(Request $request, Role $role)
    {
        $role = role::find($request->input('RoleID'));
        $PriviledgeID = $request->input('PriviledgeID');
        $role->priviledges()->attach($PriviledgeID);

        return redirect('View-Role')->with('success','Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function deleteRole($RoleID)
    {
        $data = role::find($RoleID);

        if($RoleID == 1 || $RoleID == 3 || $RoleID == 5){
            return redirect()->back()->with('error', 'Deleting this role is Prohibited!');
        }
        
        $data->delete();
        return redirect('View-Role')->with('success','Role Deleted Successfully');
    }

    

}
