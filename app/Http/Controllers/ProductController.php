<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all(){
        $data['products']=Product::all();
        return view("products.index")->with($data);
    }
    public function addform(){
        $data['categories']=Category::all();
    //    dd('heel');
        return view("products.add")->with($data);
    }
    public function add(Request $request){
        $data = $request->validate([
            "product_name" => "required|string",
            "product_availability" => "required|string",
            "product_price" => "required|integer",
            "image"=>"required|image",
            "category_id" => "required|exists:categories,id",
        ]);
        $new_image = $data['image']->hashName();
        $data['image']->move('images', $new_image);
        $data['image'] = $new_image;
       Product::create([
        "product_name" => $data['product_name'],
        "product_availability" => $data['product_availability'],
        "product_price" => $data['product_price'],
        "category_id" => $data['category_id'],
        "image" => $data['image'],
       
       ]);
        return redirect('dashboard')->withSuccess('added product successfully');
    }
    public function editform($id){
        $data['categories']=Category::all();
       $data['product']=Product::FindOrfail($id);
        return view("products.edit")->with($data);
    }
    public function edit(Request $request,$id){
        $data = $request->validate([
            "product_name" => "required|string",
            "product_availability" => "required|string",
            "product_price" => "required|integer",
            "category_id" => "required|exists:categories,id",
            "image"=>"nullable|image"
        ]);
        $old_img = Product::findOrFail($id)->image;
        if ($request->hasFile('image')) {
            Storage::delete('images/'. $old_img);

            $new_image = $data['image']->hashName();
            $data['image']->move('images', $new_image);
            $data['image'] = $new_image;
        } else {
            $data['image'] = $old_img;
        }
       Product::findOrFail($id)->update($data);
        return redirect('dashboard')->withSuccess(' product updated successfully');
    }

    public function delete($id){
        $data=Product::findOrFail($id);
        Storage::delete('images/'.$data['image']);
        Product::findOrFail($id)->delete();
      
         return redirect('dashboard')->withSuccess('deleted successfully');

    }
    public function search(Request $request){
       
            $text=$request->text;
           $data['products']=Product::where('product_name','like',"%$text%")->get();
            return view("products.product")->with($data);
        }
    
    
}
