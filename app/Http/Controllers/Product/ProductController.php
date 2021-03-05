<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function AddProduct (Request $request) 
    {
        $this->validate($request, [
             'AdminID'=>'required',
             'Name'=>'required|min:1|max:25',
             'Brand'=>'required|min:1|max:25',
             'Qty'=>'required',
             'Price'=>'required',
             'Description'=>'required|min:5|max:100'
         ]);


        $product=new product;
        $product->AdminID=Auth::id();
        $product->Name=$request->Name;
        $product->Price=$request->Price;
        $product->Brand=$request->Brand;
        $product->Qty=$request->Qty;
        $product->Description=$request->Description;
        $result=$product->save();
       /* if ($result) {
            return ["Result"=>"Data has been saved"];
        } else {
            return ["Result"=>"operation failed"];
        }*/

        return redirect('/product/viewproduct');

    }


    public function ViewProduct()
    {
        $data=product::paginate(5);
        return  view('product/viewproduct', ['products'=>$data]);
    }
      
    public function UpdateProducts($ProductID)
    {
        $data=product::find($ProductID);

    }


    public function ShowUpdatesProducts(Request $req)
    {
        $data=product::find($req->ProductID);
        $data->AdminID=$req->AdminID;
        $data->Name=$req->Name;
        $data->Price=$req->Price;
        $data->Brand=$req->Brand;
        $data->Qty=$req->Qty;
        $data->Description=$req->Description;
        $data->Status=$req->Status;
        $data->save();

        return redirect('product/viewproduct');

    }


    public function DeleteProducts($ProductID)
    {
        $data=product::find($ProductID);
        $data->delete();
        return redirect('/ViewProducts');
    }
  
    public function SearchProducts(Request $request)
    {
        
    $request->validate([
          'query'=>'required']);

        $query=$request->input('query') ;
        //dd($query);
        $product=product::where('Name', 'like', "%$query%")->orWhere('ProductID', 'like', "%$query%")->paginate(5);
        //dd($product);
        if (count($product)>0) {
            return view('/SearchProducts', ['products'=>$product]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter Available Product ...');
        }

        
    }
}