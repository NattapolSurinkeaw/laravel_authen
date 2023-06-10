<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        
        $validator = Validator::make($input, [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "400",
                "message" => "Validation failed",
                "errors" => $validator->errors()->all()
            ], 400);
        }
    
        if (Auth::guard('admin')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return response()->json([
                "status" => "200",
                "message" => "Admin login successful",
                "data" => Auth::guard('admin')->user()
            ],200);
        }else {
            return response()->json([
                "status" => "401",
                "message" => "Unauthorized",
                "data" => Auth::guard('admin')->user()
            ],401);
        }
    }

    public function logAdminOut()
    {
        Auth::guard('admin')->logout();
        return response()->json([
            "status" => "200",
            "message" => "Admin logout successful",
            "data" => Auth::guard('admin')->user()
        ],200);
    }


    public function checkUserLogin(Request $request)
    {
        $input = $request->all();

        
        $validator = Validator::make($input, [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "400",
                "message" => "Validation failed",
                "errors" => $validator->errors()->all()
            ], 400);
        }
    
        if (Auth::guard('users')->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            return response()->json([
                "status" => "200",
                "message" => "User login successful",
                "data" => Auth::guard('users')->user()
            ],200);
        }else {
            return response()->json([
                "status" => "401",
                "message" => "Unauthorized",
                "data" => Auth::guard('users')->user()
            ],401);
        }
    }

    public function logUserOut()
    {
        Auth::guard('users')->logout();
        return response()->json([
            "status" => "200",
            "message" => "User logout successful",
            "data" => Auth::guard('users')->user()
        ],200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' =>'required|min:6',
        ]);

        $emailExists = User::where('email', $request->email)->exists();
        if ($emailExists) {
            return response()->json([
                "status" => 400,
                "message" => "Email already exists"
            ], 400);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'User created successfully',
                'data' => $user
            ], 200);
        }
    }



    

}




