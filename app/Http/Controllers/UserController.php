<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function all()
    {
        $data['products'] = Product::all();
        return view("user.index")->with($data);
    }

    public function showproduct($id)
    {
        $data['product'] = Product::findOrFail($id);
        return view("user.product")->with($data);
    }

    public function addtocart($id)
    {
        $data = Product::findOrFail($id);
        Session::push('cart', $data);
        return redirect('showcart');
    }

    public function showcart()
    {
        $cart = Session::get('cart');
        return view('user.cart')->with($cart);
    }

    public function delete($key)
    {
        $cart = Session::get('cart');
        unset($cart[$key]);
        Session::put('cart', $cart);
        return redirect('showcart')->withSuccess('deleted successfully');
    }

    public function confirmorder()
    {
        // auth
        // insert order total userid
        // order products orderid productid
        if (!Auth::user()) {
            return redirect('showcart')->withErrors(['login first please']);
        }
        if(!Session::has('cart')){
            return redirect('showcart')->withErrors(['cart is empty']);

        }

        $user_id = Auth::id();
        $price = $this->total();
        $order_id = Order::insertGetId([
            'user_id' => $user_id,
            'price' => $price,
        ]);

        foreach (Session::get('cart') as  $product){
            OrderProduct::create([
                "order_id"=>$order_id,
                "product_id"=>$product->id,
            ]);
        }
        Session::forget('cart');
        return redirect('orders')->withSuccess('confirmed');




    }

    public function total()
    {
        $total = 0;
        $cart = Session::get('cart');
        foreach ($cart as $item) {
            $total += $item->product_price;
        }
        return $total;
    }

    public function orders(){
        $user_id = Auth::id();

      $data['orders']=Order::where('user_id',$user_id)->get();
    //   dd($data['orders']->products);

        $data['products']=OrderProduct::join('products', 'order_products.product_id', '=', 'products.id')
     ->get();
      return view('user.orders')->with($data);
    }

    public function search(Request $request){
       
        $text=$request->text;
       $data['products']=Product::where('product_name','like',"%$text%")->get();
        return view("user.search")->with($data);
    }
    public function profile(){
       
       
        return view("user.profile");
    }
   
}
