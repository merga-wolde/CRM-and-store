<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$category = DB::table('categories')->get();
        
        $category = DB::table('categories')->where('store_id', auth()->user()->id)->get();         
        return view('client.displaycategory', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client/addcategory');
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
                'product_category'=> 'required',
                
            ]);
    
            $category = new Category;
                $store_id= auth()->user()->id;

                $category->category = $request->input('product_category');
                $category->store_id = $store_id;
                $category->save();
                if($category){
                return redirect('client/displaycategory')->with('success', 'category added successfully');
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
        $category = Category::find($id);
        return view("client.editcategory")->with('category', $category);
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
        // $this->validate($request, [
        //     'category'=> 'required',
            
        // ]);

        $category = $request->input('product_category');
        $update = [
            'category' => $category,
        ];
        Category::where('id', $id)->update($update);

        if ($update) {
         
            return redirect('client/displaycategory')->with('success', 'category updated successfully');
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
        //
    }
}
