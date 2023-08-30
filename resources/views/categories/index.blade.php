
@extends('inc.layout')
@section('content')
@include('inc.errors')

    <div class="container m-auto ">
      <div class="d-flex align-items-center mt-5 mb-4">
        <h2 class="lead me-5"> all categories</h2>
        <div>
        <a class="btn btn-outline-primary  ms-4" href="{{url('/categoryadd')}}"> Add Category</a>
        </div>
      </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                   
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{url('categories/edit/'.$category->id)}}" class="btn btn-success">edit</a></td>
                        <td><a href="{{'categories/'. $category->id }}" class="btn btn-danger">delete</a></td>
                        <td><a href="{{'showproducts/'. $category->id }}" class="btn btn-secondary">show products..</a></td>
                    </tr>
                @endforeach


            </tbody>
        </table>


    </div>
@endsection

  
