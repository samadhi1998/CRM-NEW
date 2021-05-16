<?php

namespace App\Http\Controllers\charge;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\extra_charge;
use Illuminate\support\Facades\DB;
use App\Models\product;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_details;
use Carbon\Carbon;

class ChargeController extends Controller
{
 
    public function __construct() {
        $this->authorizeResource(extra_charge::class,extra_charge::class);
    }

    public function AddExtraChargers (Request $request) 
    {    $request->validate( [
        'Type'=>'required',
        'Amount'=>'required|numeric|min:50|max:50000',
        ]);
      
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
        return redirect('/ViewChargers')-> with ('success','chargers are added successfully');
    }

    


    public function Addcharge($id)
    {
        $extra_charges=  DB::table('orders')
        ->where('OrderID',$id)
         ->get()->first(); 
        // dd( $extra_charges);
        if($extra_charges->Progress == 'Order Completed'){
            return redirect()->back()->with('error', 'This order is already completed. You can not add extra charge...');
        }elseif($extra_charges->Progress == 'Order Canceled'){
            return redirect()->back()->with('error', 'This order is canceled. You can not add extra charge...');
        }elseif($extra_charges->Status == 'Estimated Quotation'){
            return redirect()->back()->with('error', 'This order is still in progress. You can not add extra charge...');
        }
        return  view('charge/addcharge',['extra_charge'=>$extra_charges]);

    }



  
    public function ViewChargers()// view chargers
    {
        $data=extra_charge::sortable()->paginate(5);
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
        return redirect('/ViewChargers')-> with ('success',' Chargers Information Updated successfully...');
    }


    public function SearchChargers(Request $request)
    {
        
    $request->validate([
          'query'=>'required']);

        $query=$request->input('query') ;
        //dd($query);
        $extra_charge=extra_charge::where('OrderID', 'like', "%$query%")
        ->orWhere('Description', 'like', "%$query%")
        ->orWhere('Type', 'like', "%$query%")->paginate(5);
        //dd($customer);
        if (count($extra_charge)>0) {
            return view('charge/searchcharge', ['extra_charge'=>$extra_charge]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter Available Chargers Details');
        }

    }

    public function ChargeInfo($id)
    {  
        // dd($id);
         $extra_charges=  DB::table('extra_charges')  
         ->join('users','extra_charges.ServicePersonID',"=",'users.EmpID')
         ->join('orders','extra_charges.OrderID',"=",'orders.OrderID')
         ->select('extra_charges.ExtraChargeID','extra_charges.OrderID','extra_charges.Created_at','extra_charges.Type','extra_charges.Amount',
         'extra_charges.Description','extra_charges.ServicePersonID','users.name','users.MobileNo','users.email')
         ->where('extra_charges.ExtraChargeID', '=',$id)
          ->get()->toArray();;   
        //dd( $extra_charges) ;
         return view('charge.chargeInformation',['extra_charges'=>$extra_charges]);
    }

    public function DeleteExChargers($ExtraChargeID)
    {
        $data=extra_charge::find($ExtraChargeID);
        $data->delete();
        return redirect('/ViewChargers')-> with ('success',' Product Information Deleted successfully...');
    }
  

    public function restore()
    {
        $extra_charge =extra_charge::whereNotNull('deleted_at' );
        $extra_charge->restore();
        return redirect('/ViewChargers')->with('success','Charges Restored Successfully');
    }





    
}
