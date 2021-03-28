<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\customer;
use App\Models\Order;
use App\Models\product;
use App\Models\order_detail;


class CustomerController extends Controller
{
     public function index(){

     
        $customers = Customer::all();

        return view('customer/customerorderdetail', compact('customers'));
        
        
     }
     
     public function AddCustomer(Request $request){

        $request->validate( [
        
            'Name'=>'required|min:1|max:25',
            'NIC'=>'required|unique:customers|regex:/^[0-9]{9}[vVxX]$/|min:10',
            'Address'=>'required|min:1|max:300',
            'MobileNo'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' =>  'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:customers|max:350'
           
        ]);

     
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
        return redirect('/searchordercustomer');
    }


    
    public function ViewCustomers()
    {
        $data=customer::paginate(10);
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

  function CustomerCount(){
    return DB::table ('customers')->count();

  }

  function customercheck(){
    return('customer/customer');

  }

   // public function customerorder(Request $request, Order $model)
    // {
    //     $existent = Order::where('CustomerID', $request->get('CustomerID'))->get();
    //     $customer = DB::table('customers')->where('CustomerID', $request->get('CustomerID'))->value('CustomerID');


    //     if($existent->count()) {
    //         return redirect()
    //         ->route('/create', ['customers' => $customer]);
    //     }

    //     $Order = $model->create($request->all());
        
    //     return redirect()
    //         ->route('/create', ['Order' => $Order->CustomerID]);
            
    // }
  









}