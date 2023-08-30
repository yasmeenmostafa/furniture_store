<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
        public function all(){
            $data['categories']=Category::all();
            return view("categories.index")->with($data);
        }
        public function addform(){
        
            return view("categories.add");
        }
        public function add(Request $request){
            $data = $request->validate([
                "name" => "required|string",
                
            ]);
           Category::create($data);
            return redirect('categories')->withSuccess('added Category successfully');
        }
        public function editform($id){
           $data['category']=category::FindOrfail($id);
            return view("categories.edit")->with($data);
        }
        public function edit(Request $request,$id){
            $data = $request->validate([
                "name" => "required|string",
            ]);
           Category::findOrFail($id)->update($data);
            return redirect('categories')->withSuccess(' category updated successfully');
        }
    
        public function delete($id){
            $data=Category::findOrFail($id)->delete();
          
             return redirect('categories')->withSuccess('deleted successfully');
    
        }
        
        public function showproducts($id){
            $data['category']=Category::findOrFail($id);
            $data['products']=Product::where('category_id',$id)->get();
            return view("categories.products")->with($data);
        }
        public function deleteproduct($id,$category_id){
            // dd('dele');
            $data=Product::findOrFail($id)->delete();
          
             return redirect('showproducts/'.$category_id)->withSuccess('deleted successfully');
    
        }
        
        
    }

