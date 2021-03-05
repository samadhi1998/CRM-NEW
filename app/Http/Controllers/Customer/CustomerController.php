<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
class CustomerController extends Controller
{
    public function AddCustomer(Request $request){
     
        $customer=new customer;
        $customer->CustomerID=$request->CustomerID;
        $customer->Name=$request->Name;
        $customer->NIC=$request->NIC;
        $customer->Address=$request->Address;
        $customer->MobileNo=$request->MobileNo;
        $customer->Email=$request->Email;
        $result=$customer->save();
        /*if ($result) {
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"operation failed"];
        }*/
        return redirect('/ViewCustomers');
    }


    
    public function ViewCustomers()
    {
        $data=customer::paginate(5);
        return  view('customer/viewcustomer', ['customers'=>$data]);
    }

    public function UpdateCustomers($CustomerID)
    {
        $data=customer::find($CustomerID);
        return view('customer/updatecustomer', ['data'=>$data]);
    }


    public function ShowUpdatesCustomers(Request $req)
    {
        $data=customer::find($req->CustomerID);

        $data->Name=$req->Name;
        $data->NIC=$req->NIC;
        $data->Address=$req->Address;
        $data->MobileNo=$req->MobileNo;
        $data->Email=$req->Email;
        $data->save();
        
        /*if ($data) {
            return ["data"=>"Data has been saved"];
        } else {
            return ["data"=>"operation failed"];
        }*/
        return redirect('/ViewCustomers');
    }

    public function DeleteCustomers($CustomerID)
    {
        $data=customer::find($CustomerID);
        $data->delete();
        return redirect('/ViewCustomers');
    }


    public function SearchCustomers(Request $request)
    {
        
    $request->validate([
          'query'=>'required']);

        $query=$request->input('query') ;
        //dd($query);
        $customer=customer::where('Name', 'like', "%$query%")->orWhere('Address', 'like', "%$query%")->paginate(5);
        //dd($customer);
        if (count($customer)>0) {
            return view('customer/searchcustomer', ['customers'=>$customer]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter Available Customers...');
        }

    }


}