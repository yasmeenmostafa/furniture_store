@extends('inc.layout')
@section('content')
@include('inc.errors')

    <div class="container m-auto ">
      <div class="d-flex align-items-center mt-5 mb-4">
        <h2 class="lead me-5"> {{$category->name}} products</h2>
       
      </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Avalability</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->product_name }}</td>
                    <td><img src="{{asset('images/'.$product->image)}}" width="50px" alt=""></td>

                        <td>{{ $product->product_availability }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td><a href="{{url('products/edit/'.$product->id)}}" class="btn btn-success">edit</a></td>
                        <td><a href="{{url('showproducts/delete/'. $product->id.'/'. $product->category->id)}}" class="btn btn-danger">delete</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>


    </div>
@endsection

  
