<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function product(){
        return view('home.product_listing');
    }


    public function add_product(){

        $attribute = request()->validate([
            'title' => ['required'],
            'price' => ['required'],
            'catagory' => ['required']
        ]);

        $product = Product::create($attribute);

        return redirect()->back();
    }
    

    public function show_product(){

        $product = product::all();
        return view('home.product', compact('product'));
    }


    public function delete_product($id)
{
    $product = Product::find($id); // Corrected typo

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found!');
    }

    $product->delete();
    return redirect()->back()->with('success', 'Product deleted successfully!');
}

   public function edit_view($id) {

    $product=Product::find($id);

    return view('home.edit_product', compact('product'));
   }

   public function update_product(Request $request, $id){

    $request->validate([
        'title' => ['required', 'string' ],
        'price' => ['required', 'numeric'],
        'catagory' => ['required', 'string']
    ]);
    
    $product = Product::find($id);

    $product->title = $request->title;
    $product->price = $request->price;
    $product->catagory = $request->catagory;

    $product->save();

    return redirect('show_product');
}
}