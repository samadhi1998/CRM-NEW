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
        
        $this->validate($request, [
        
             'Name'=>'required|min:1|max:25',
             'Brand'=>'required|min:1|max:25',
             'Price'=>'required',
             'Qty'=>'required|numeric|min:1',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
             'Warranty'=>'required',
             'Description'=>'required|min:1|max:100'
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
        $result=$product->save();
     
        return redirect('/product/viewproduct')-> with ('success','Product Inserted successfully');

    }


    public function ViewProduct()
    {
        $data=product::paginate(5); 
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
         return DB::table ('products')->count();

   } 


   public function stockOut()//get stockout  product details
	{
		$data = DB::table('products')->whereBetween('Qty', [1, 4])->paginate(5);
        return view('product/productReorder', compact('data'));
	}

    public function instock()//get in stock product details
	{
		$data = Product::where('Qty', '>=', 5)->paginate(5);
        return view('product/productStock', compact('data'));
	}

    public function notavailable()//get not available stock product details
	{
		
        $data = Product::where('Qty', '<=', 0)->paginate(5);
        return view('product/productNotAvailable', compact('data'));
       

    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'Due_date' => 'required',
    //         'Progress'=>'required',
    //         'Qty'=>'required',
    //     ]);
    
    //      $productId=request('ProductID'); 
    //      $qtyOld=DB::table('Products')->where('ProductID',$productId)->value('Qty');
    //      $qty1=$request->get('Qty')-$qtyOld;
    //      //this statement can be a error
            
    //     Order::create($request->all());
    //     order_detail::create($request->all());
       
    //     return redirect()->route('orders.index')
    //                     ->with('success','Order created successfully.');

    //     DB::table('products')->where('ProductID', $content->ProductID)->update(['Qty' => DB::raw($qty1)]);
    //}



    public function ProductInfo(product $product)
    {
        $products=  DB::table('Products')  
        ->join('users','products.AdminID',"=",'users.EmpID')
        ->select('products.AdminID','users.name','users.MobileNo','users.email','products.ProductID' ,
        'Products.Created_at','Products.Name','Products.Brand','Products.Description',
        'Products.Warranty','Products.Price','Products.Qty','Products.Status')
       
        ->where('products.ProductID', '=',$product['ProductID'])
        ->get();   
        return view('product.productInformation',['products'=>$products]);
    }


}