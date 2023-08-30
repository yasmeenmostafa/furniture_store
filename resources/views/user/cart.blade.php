@extends('user.inc.layout')
@section('content')
@include('inc.errors')

    <div class="container m-auto ">
      <div class="d-flex align-items-center mt-5 mb-4">
        <h2 class="lead me-5"> your cart</h2>
       
      </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    
                    <th scope="col">Price</th>
                    
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has('cart'))
                
                
                @foreach (Session::get('cart') as $key=> $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{asset('images/'.$product->image)}}" width="50px" alt=""></td>
                    <td>{{ $product->product_name }}</td>        
                    <td>{{ $product->product_price }}</td>
                    <td><a href="{{url('delete/'. $key) }}" class="btn btn-danger">delete</a></td>
                </tr>
                 
                    
                @endforeach
                @endif
               {{-- @endif --}}
                    
               


            </tbody>
        </table>
        <a href="{{url('confirmorder')}}" class="btn btn-success rounded-0 m-auto" > confirm order</a>



    </div>
@endsection