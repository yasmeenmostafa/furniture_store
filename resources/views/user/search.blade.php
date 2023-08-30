@extends('user.inc.layout')
@section('content')
    @include('inc.errors')

    <div class="container m-auto mt-5 d-flex flex-wrap ">
        @foreach ($products as $product)


            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <img src="{{asset('images/'.$product->image)}}" height="300px" class="w-100" alt="">
                    <h6 class="card-title lead mt-2">  {{$product->product_name}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted"> {{$product->product_availability}}</h6>
                   
                    <a href="#" class="card-link text-decoration-none">product_price:  {{$product->product_price}}</a>
                    <br>
                    <a href="#" class="card-link text-decoration-none">Category: {{$product->category->name}}</a>
                </div>
            </div>


        @endforeach
    </div>
@endsection
