<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all(){
        $products=Product::all();
        return response()->json($products);
    }
    public function showone($id){
        
        $product=Product::find($id);
        if($product==null){
            return response()->json(["msg"=>"product not found"],404);

        }    
        return response()->json($product);  
    }

   
    public function store(Request $request){
        // validation
        $data=$request->validate([
            "product_name" => "required|string|max:255",
            "product_availability" => "required|string",
            "product_price" => "required|numeric",
            "category_id" => "required|numeric",
          
        ]);
      

        // insert
        Product::create($data);

        // return msg
        return response()->json(
            ["msg"=>"data created successfully"],201
        );

    }


    public function delete($id){
        $product=Product::find($id);
        if($product==null){
            return response()->json(["msg"=>"product not found"],404);

        }
        if($product->image!=null){
        Storage::delete($product->image);
        }
        $product->delete();
        return response()->json(
            ["msg"=>"data deleted successfully"],200
        );


    }


    public function update(Request $request){
        // validation
         $data = $request->validate([
            "product_name" => "required|string|max:255",
            "product_availability" => "required|string",
            "product_price" => "required|numeric",
            "category_id" => "required|numeric",
            "id"=>"required"
          
        ]);
        $product=Product::find($request->id);
        if(! $product){
            return response()->json(["msg"=>"product not found"],404);

        }
       
    
        // update
        $product->update($data);
        return response()->json(
            ["msg"=>"data updated successfully"],200
        );


    }

}
