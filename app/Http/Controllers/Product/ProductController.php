<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\product;
use App\Models\User;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct() {
        $this->authorizeResource(product::class, product::class);
    }

    public function AddProduct (Request $request) 
    {
        
        $request->validate( [
        
            'Name'=>'required|min:1|max:25|unique:products',
            'Brand'=>'required|min:1|max:25',
            'Price'=>'required',
            'Qty'=>'required|numeric|min:6',
            'ReOrderLevel'=>'required|numeric|',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'Warranty'=>'required',
            'Description'=>'required|min:4|max:100'
            ]);


        $product=new product;
        $product->AdminID = Auth::user()->EmpID;
        $product->Name=$request->Name;
        $product->Brand=$request->Brand;

        if($request->hasfile('image')){
           $file=$request->file('image');
           $extension=$file->getClientOriginalExtension();//get image extension
           $filename= time().'.'.$extension;
           $file->move('uploads/product',$filename); 
           $product->image=$filename;
           }else{
               return $request;
               $product->image='';
           }
        $product->Price=$request->Price;
        $product->Qty=$request->Qty;
        $product->Warranty=$request->Warranty;
        $product->Description=$request->Description;
        $product->ReOrderLevel=$request->ReOrderLevel;
        $result=$product->save();
     
        return redirect('/product/viewproduct')-> with ('success','Product Inserted successfully');

    }


    public function ViewProduct()
    {
        $data=product::sortable()->paginate(5); 
       return  view('product/viewproduct', ['products'=>$data]);
    }

      
    public function UpdateProducts($ProductID)
    {
        $data=product::find($ProductID);
        return view('product/updateproduct', ['data'=>$data]);

    }


    public function ShowUpdatesProducts(Request $req)
    {
        $data=product::find($req->ProductID);
       // $data->AdminID=$req->AdminID;
        $data->Name=$req->Name;
        $data->Brand=$req->Brand;

        // if($req->hasfile('image')){
        //     $file=$req->file('image');
        //     $extension=$file->getClientOriginalExtension();//get image extension
        //     $filename= time().'.'.$extension;
        //     $file->move('uploads/product',$filename); 
        //     $data->image=$filename;
        //   }else{
        //      return $req;
        //      $data->image='';
        //   }
       
        $data->Price=$req->Price;
        $data->Qty=$req->Qty;
        $data->Warranty=$req->Warranty;
        $data->Description=$req->Description;
        $data->Status=$req->Status;
        $data->stock_defective=$req->stock_defective;
        $data->save();
        return redirect('product/viewproduct');

    }


    public function deleteproducts($ProductID)
    {
        $data=product::find($ProductID);
        $data->delete();
        return redirect('product/viewproduct');
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
            return view('product/searchproduct', ['products'=>$product]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter Available Product ...');
        }
        
    }

         function ProductCount()    {
         $count = DB::table ('products')->count();
         return  view('product/viewproduct', ['$counts'=>$count]);
        // dd($data );  

   } 


   public function stockOut()//get re order  product details
	{   
         
	$data=product::where('Qty', '>', 0)->whereColumn('Qty', '<=','ReOrderLevel')->paginate(5);
	return view('product/productReorder', compact('data'));
	}

    public function instock()//get in stock product details
	{
		$data = Product::whereColumn('Qty', '>','ReOrderLevel')->paginate(5);
        return view('product/productStock', compact('data'));
	}

    
    public function notavailable()//get not available stock product details
	{
		
        $data = Product::where('Qty', '<=', 0)->paginate(5);
        return view('product/productNotAvailable', compact('data'));
       
    }

    
    public function ProductInfo($id)
    {   //dd($id);
        $products=  DB::table('Products')  
        ->join('users','products.AdminID',"=",'users.EmpID')
        ->select('products.AdminID','users.name','users.MobileNo','users.email','products.ProductID' ,
        'Products.Created_at','Products.Name','Products.Brand','Products.Description',
        'Products.Warranty','Products.Price','Products.Qty','Products.Status','Products.stock_defective','Products.ReOrderLevel')
        ->where('products.ProductID', '=',$id)
        ->get()->toArray();
        //dd($products);
        return view('product.productInformation',['products'=>$products]);
    }

}