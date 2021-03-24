<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Priviledge;
use App\Models\role_priviledges;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = role::all();
        return view('admin.users.viewrole',['roles'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin/users/createrole')
        ->with('priviledges',Priviledge::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=new role;
        $role->name = $request->name;
        
        // $role->Description=$request->Description;
        $result=$role->save();

       /* if ($result) {
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"operation failed"];
        }*/
        // Order::create($request->TaskID());
        return redirect('/View-Role');
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
        $data = role::find($request->input('RoleID'));
        $data->RoleID = $request->input('RoleID');
        $data->name = $request->input('name');
        
        $priviledges = $request->PriviledgeID;

        foreach($priviledges as $PriviledgeID){
            
            $content = new role_priviledges;
            $content=role_priviledges::create([
            'RoleID' => $request->RoleID,
            'PriviledgeID' => $PriviledgeID,
            //'PriviledgeID' => implode(',', $request->PriviledgeID),
        ]);
        }
        
        $data->save();

        return redirect('View-Role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    public function viewpriviledge($RoleID){

        $data = role::find($RoleID);
        return view('admin.users.addpriviledge',['roles'=>$data])
            ->with('priviledges',Priviledge::all());
    }

    public function addpriviledge(Request $request){

        $priviledges = $request->PriviledgeID;

        foreach($priviledges as $priviledge){
                $data = new role_priviledge;
                $data->RoleID = $request->input('RoleID');
                $data->PriviledgeID =$request->input('PriviledgeID');
        //     $data->PriviledgeID = true;
                role_priviledge::create($data);
                // $data->Save;
        }

        // $content=role_priviledges::create([
        //     'RoleID' => $request->RoleID,
        //     'PriviledgeID' => implode(',', $request->PriviledgeID),
        // ]);

        // $data = $request->input();
        // $data->RoleID = $request->input('RoleID');
        // $data['PriviledgeID'] = implode(",",$data['PriviledgeID']);
        // role_priviledge::create($data);

        return redirect('/View-Role');
    }

    public function joinrolepriviledges(Role $role)
    {
        // return DB::table('orders')->get();
          return DB::table('role_priviledges')
          ->join('roles','roles.RoleID',"=",'role_priviledges.RoleID')
          ->join('priviledges','priviledges.PriviledgeID',"=",'role_priviledges.PriviledgeID')
          ->select('role_priviledges.RoleID','role_priviledges.PriviledgeID')
          ->where('roles.RoleID',1)
          ->get();   
    }

    

}
