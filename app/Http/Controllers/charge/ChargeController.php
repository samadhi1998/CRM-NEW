<?php

namespace App\Http\Controllers\charge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\extra_charge;

class ChargeController extends Controller
{

    public function AddExtraChargers (Request $request) 
    {
      
        $charge=new extra_charge;
        $charge->OrderID=$request->OrderID;
        $charge->ServicePersonID=$request->ServicePersonID;
        $charge->Type=$request->Type;
        $charge->Amount=$request->Amount;
        $charge->Description=$request->Description;
        $result=$charge->save();
        /*if ($result) {
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"operation failed"];
        }*/
        return redirect('/ViewChargers');
    }


  
    public function ViewChargers()// view chargers
    {
        $data=extra_charge::paginate(5);
        return  view('charge/viewcharge',['extra_charge'=>$data]);
    }


    public function UpdateChargers($ExtraChargeID)
    {
        $data=extra_charge::find($ExtraChargeID);
        return view('charge/updatecharge',['data'=>$data]);
    }
    
    
    public function ShowUpdateExtraChargers(Request $req) 

    {
        $data=extra_charge::find($req->ExtraChargeID);

        $data->OrderID=$req->OrderID;
        $data->ServicePersonID=$req->ServicePersonID;
        $data->Type=$req->Type;
        $data->Amount=$req->Amount;
        $data->Description=$req->Description;
        $data->save();
        return redirect('/ViewChargers');
    }


    public function SearchChargers(Request $request)
    {
        
    $request->validate([
          'query'=>'required']);

        $query=$request->input('query') ;
        //dd($query);
        $extra_charge=extra_charge::where('ExtraChargeID', 'like', "%$query%")->orWhere('Description', 'like', "%$query%")->paginate(5);
        //dd($customer);
        if (count($extra_charge)>0) {
            return view('charge/searchcharge', ['extra_charge'=>$extra_charge]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter Available Chargers Details');
        }

    }





    
}
