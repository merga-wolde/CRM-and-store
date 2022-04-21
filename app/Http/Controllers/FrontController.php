<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Checkout;
use App\Category;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $product = DB::table('products')->orderBy('created_at', 'desc')->where('store_id', auth()->user()->id)->get(); 
        $category = DB::table('categories')->where('store_id', auth()->user()->id)->get(); 
        $products= [
            'product'=>$product,
            'category'=> $category,
        ];
        
        return view('client.index')->with($products);
    }
    public function checkout()
    { 
        $cart = Cart::content()->toArray();
        $product = DB::table('products')->where('store_id', auth()->user()->id)->get(); 
        $products= [
            'product'=>$product,
            'cart'=> $cart,
        ];
        return view('client.checkout')->with($products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$cart = Cart::content();
        $cart = Cart::content()->toArray();
        
        return view('client.cart')->with('cart', $cart);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkout = new Checkout;
        $cart = Cart::content()->toArray();
        
        
            foreach ($cart as $item)
            {
                $prod_name = $item['name'];
                $quantity = $item['qty'];
                $prod_price= $item['qty']* $item['price'];
                

                $checkout->firstname = $request->input('fname');
                $checkout->lastname = $request->input('lname');
                $checkout->email = $request->input('email');
                $checkout->address = $request->input('address');
                $checkout->phone = $request->input('mobile');
                $checkout->country = $request->input('country');
                $checkout->city = $request->input('city');
                $checkout->zip = $request->input('zip');
                $checkout->pay_method = $request->input('payement');
                $checkout->product_name = $prod_name;
                $checkout->quantity = $quantity;
                $checkout->total_money = $prod_price; 
                $checkout->order_status = 0; 
                
                $checkout->save();
            }
        
       
        if ($checkout) {
            Cart::destroy();
            return redirect('client/index')->with('success', 'order added successfully');
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
    public function show(Request $request)
    {
        $product = DB::table('products')->where('product_category', $request->input('category'))->get();
        $category = DB::table('categories')->where('store_id', auth()->user()->id)->get(); 
        $products = [
            'product'=>$product,
            'category'=> $category,
        ];
         return view('client.showcategory')->with($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
