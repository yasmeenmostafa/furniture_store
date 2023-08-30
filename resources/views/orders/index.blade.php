@extends('inc.layout')
@section('content')
@include('inc.errors')
    <div class="container m-auto ">
        <div class="d-flex align-items-center mt-5 mb-4">
            <h2 class="lead me-5"> all orders</h2>
           
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">price</th>
                    <th scope="col">username</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->user->name }}</td>
                    
                    <td><a href="{{url('orders/products/'. $order->id) }}" class="btn btn-success">show order products..</a></td>
                    <td><a href="{{'orders/'. $order->id }}" class="btn btn-danger">delete</a></td>
                       

                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
@endsection
