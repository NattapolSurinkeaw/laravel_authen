<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function getProducts() 
    {
        $products = Product::all();

        return view("pages/productlist",[
            "products" => $products
        ]);
    }

    //
    public function createform()
    {
        return view('pages.createproduct');
    }

    public function editform($id)
    {
        $product = Product::find($id);
        return view("pages.editproduct",[
            "product" => $product
        ]);
    }

    public function cartProduct(){
        $cartproduct = Cart::all();
        return view("pages.cartproduct",[
            "carts" => $cartproduct
        ]);
    }


}
