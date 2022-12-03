<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function productList(){
        $data = Product::all();
        return view('product-list', compact('data'));
    }

    public function addProduct(){
        return view('add-product');
    }

    public function saveProduct(Request $request){
        // validating the form
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $prodname = $request->name;
        $prodprice = $request->price;
        $proddesp = $request->description;
        $prodimage = $request->file('image')->getClientOriginalName();

        // move uploaded file here
        $request->image->move(public_path('images'), $prodimage);

        $prod = new Product();
        $prod->prodname = $prodname;
        $prod->prodprice = $prodprice;
        $prod->proddesp = $proddesp;
        $prod->prodimage = $prodimage;

        $prod->save();

        return redirect('/product-list')->with('success', 'New Product added successfully');
    }
}
