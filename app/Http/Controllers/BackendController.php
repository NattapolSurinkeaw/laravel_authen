<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{

    public function getProduct()
    {
        $products = Product::all();
        
        if($products->isEmpty()){
            return response()->json([
                "status" => "404",
                "message" => "No products found"
            ], 404);
        }
        
        return response()->json([
            "status" => "200",
            "products" => $products
        ], 200);

    }

    public function getProductById($id)
    {
        $product = Product::find($id);
        
        if($product){
            return response()->json([
                "status" => "200",
                "product" => $product
            ], 200);
            
        }
        
        return response()->json([
            "status" => "404",
            "message" => "No product found"
        ], 404);
    }


    //
    public function createproducts(Request $request){
        $validator = Validator::make($request->all(),[
            "nameproduct" => "required",
            "description" => "required",
            "price" => "required",
            "quantity" => "required",
        ]);

        if($validator->fails()) {
            return response()->json([
                "status" => 422,
                "errors" => $validator
            ],422);
        }

        $product = Product::create([
            "nameproduct" => $request->nameproduct,
            "description" => $request->description,
            "price" => $request->price,
            "quantity" => $request->quantity
        ]);

        if($product){
            return response()->json([
                "status" => 200,
                "message" => "Product created successfully"
            ]);
        }

        return response()->json([
            "status" => 422,
            "message" => "Something went wrong."
        ], 422);
    } 

    
    public function editProduct(Request $request,$id) {
        $product = Product::find($id);

        if(!$product){
            return response()->json([
                "status" => 404,
                "message" => "Product not found"
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            "status" => 200,
            "product" => $product
        ], 200);
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "Status" => 404,
                "message" => "product not found."
            ], 404);
        }

        $product->delete();

        return response()->json([
            "status" => 200,
            "message" => "product deleted successfully."
        ], 200);
    }

    public function checkAdminLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
         

        if (Auth::guard('admin')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return response()->json([
                "status" => "200",
                "message" => "Admin login successful"
            ],200);
        }else {
            return response()->json([
                "status" => "401",
                "message" => "Unauthorized"
            ],401);
        }
    }

    public function logAdminOut()
    {
        Auth::guard('admin')->logout();
        return response()->json([
            "status" => "200",
            "message" => "Admin logout successful"
        ],200);
    }

}


