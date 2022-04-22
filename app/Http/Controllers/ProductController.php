<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;
use App\Checkout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Paginator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = DB::table('products')->get();
        $products = DB::table('products')->where('store_id', auth()->user()->id)->paginate(5);       

        return view('client.displayproducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store_id= auth()->user()->id;
        $category = DB::table('categories')->where('store_id', $store_id)->get();
        
        return view('client/addProducts',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'=> 'required',
            'product_description'=> 'required',
            'product_quantity'=> 'required',
            'product_price_per_unit'=> 'required',

        ]);

        $products = new Product;
        $filepath = $request->file('product_image')->store('public/images');
        if ($filepath) {
            $path = explode('/',$filepath);
            $file = end($path);
            $products->product_name = $request->input('product_name');
            $products->product_description = $request->input('product_description');
            $products->product_quantity = $request->input('product_quantity');
            $products->product_price_per_unit = $request->input('product_price_per_unit');
            $products->product_category = $request->input('product_category');
            $products->product_image = $file;
            $products->product_active = 1;
            $products->store_id = auth()->user()->id; 
            
            $products->save();
            
            return redirect('client/displayproducts')->with('success', 'product added successfully');
        }
        else{
            return redirect()->back()->with('error', 'something went wrong');
        }

    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = DB::table('categories')->where('store_id', auth()->user()->id)->get(); 
        $products= [
            'product'=>$product,
            'category'=> $category,
        ];
        
        return view("client.edit")->with($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'product_name'=> 'required',
            'product_description'=> 'required',
            'product_quantity'=> 'required',
            'product_price_per_unit'=> 'required',

        ]);

        
        $filepath = $request->file('product_image')->store('public/images');
        if ($filepath) {
            $path = explode('/',$filepath);
            $file = end($path);
            $product_name = $request->input('product_name');
            $product_description = $request->input('product_description');
            $product_quantity = $request->input('product_quantity');
            $product_price_per_unit = $request->input('product_price_per_unit');
            $product_category = $request->input('product_category');
            $product_image = $file;
            $product_active = 1;
            
            //$product= Product::where('id', $id)->update($products);

            $update = [
                'product_name' => $product_name,
                'product_description' => $product_description,
                'product_quantity' => $product_quantity,
                'product_price_per_unit' => $product_price_per_unit,
                'product_image' => $product_image,
                'product_category' => $product_category,
                'product_price_per_unit' => $product_price_per_unit,
                'product_active' => $product_active,
            ];
            
            Product::where('id', $id)->update($update);
            return redirect('client/displayproducts')->with('success', 'product updated added successfully');
        }
        else{
            return redirect()->back()->with('error', 'something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        $delete -> delete();
       if($delete){
        return redirect('client/displayproducts')->with('success', 'product deleted successfully');
    }
    else{
        return redirect()->back()->with('error', 'something went wrong');
    }
        
    }

    public function order()
    {
        //$products = DB::table('products')->get();
        $orders = DB::table('checkouts')->paginate(5);       

        return view('client.order', compact('orders'));
    }

    public function approve($id)
    {
        //$order = Checkout::find($id);
        $order = [
            'order_status'=> 1
        ];
        Checkout::where('id', $id)->update($order);
        return redirect('client/order')->with('success', 'order addedd succesfully');
        //return view("client.order");
    }
   
    public function delete($id)
    {
        $delete = Checkout::find($id);
        $delete -> delete();
       if($delete){
        return redirect('client/order')->with('success', 'product deleted successfully');
    }
    else{
        return redirect()->back()->with('error', 'something went wrong');
    }
        
    }
}
