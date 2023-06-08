<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{

    public function getProductCart(){
        $carts = Cart::all();
        if($carts->isEmpty()){
            return response()->json([
                "status" => "404",
                "message" => "No Product in Cart"
            ],404);
        }

        return response()->json([
            "status" => "200",
            "message" => $carts
        ], 200);
    }
    
    public function addToCart($id){
        $product = Product::find($id);

        if(!$product){
            return response()->json([
                "status" => 404,
                "message" => "Product not found"
            ], 404);
        }

        $cartItem = Cart::where('product_id', $product->id)->first();
        if($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();

            return response([
                "status" => 200,
                "message" => "Added to cart"
            ], 200);
        } else {
            $cartItem = new Cart([
                'product_id' => $product->id,
                'name' => $product->nameproduct,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => 1
            ]);
            $cartItem->save();

            return response([
                "status" => 200,
                "message" => "Added to cart"
            ], 200);
        }
    }


}
