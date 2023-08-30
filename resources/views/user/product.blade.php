@extends('user.inc.layout')
@section('content')
    <section class="row   bg-light">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div>
            <p class=" lead">name:{{$product->product_name}}</p>
            <p class=" lead">price:{{$product->product_price}}</p>
            <p class=" lead">availability:{{$product->product_availability}}</p>
            <a href="{{url('product/cart/'.$product->id)}}" class="btn btn-success rounded-0" >Buy Now</a>
            </div>
        </div>
        <div class="col-md-6 ">
            <img class="w-100" height="750px" src="{{asset('images/'.$product->image)}}" alt="">
        </div>

    </section>




@endsection
