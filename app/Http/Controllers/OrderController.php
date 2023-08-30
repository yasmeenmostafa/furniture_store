<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all(){
        $data['orders']=Order::all();
        return view("orders.index")->with($data);
    }
    public function delete($id){
        $data=Order::findOrFail($id)->delete();
      
         return redirect('orderss')->withSuccess('deleted successfully');

    }
    public function showproducts($order_id){
        $data['products']=OrderProduct::join('products', 'order_products.product_id', '=', 'products.id')
       ->where('order_id',$order_id)
        ->get();

        return view('orders.products')->with($data);

    }
}
