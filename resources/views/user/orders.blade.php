@extends('user.inc.layout')
@section('content')
@include('inc.errors')

    <div class="container m-auto ">
      <div class="d-flex align-items-center mt-5 mb-4">
        <h2 class="lead me-5"> your orders</h2>
       
      </div>
      @foreach($orders as $order)
        <p class="text-success">order:{{$order->id}}</p>
        <p class="text-success">total:{{$order->price}}</p>
        <table class="table">
            
            <tbody>
              
              
                @foreach ($products as  $product)
                @if($order->id==$product->order_id)
                <tr>
                    {{-- {{var_dump($product)}} --}}
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    <td><img src="{{asset('images/'.$product->image)}}" width="50px" alt=""></td>
                    <td>{{ $product->product_name }}</td>        
                    <td>{{ $product->product_price }}</td>
                    {{-- <td><a href="{{url('delete/'. $key) }}" class="btn btn-danger">delete</a></td> --}}
                </tr>
                @endif
                 
                    
                @endforeach
               {{-- @endif --}}
                    
               


            </tbody>
        </table>
      @endforeach




    </div>
@endsection