@extends('inc.layout')
@section('content')
<div class="d-flex justify-content-center align-items-center m-5">
<form method="POST" class="w-75 border border-primary rounded-1 p-4" action="{{url('products/insert')}}" enctype="multipart/form-data">
    @csrf
    <h1 class="lead text-primary"> Add Product</h1>

@include('inc.errors')

    <div class="form-group my-3">
        <label class="mb-2" for="exampleInputproduct_name">product_name</label>
        <input type="text" class="form-control" id="exampleInputproduct_name" aria-describedby="emailHelp"
            placeholder="product_name" name="product_name">
    </div>
    <div class="form-group my-3">
        <label  class="mb-2"  for="exampleInputproduct_price">product_price</label  class="mb-2">
        <input type="text" class="form-control" id="exampleInputproduct_price" aria-describedby="emailHelp"
            placeholder="product_price" name="product_price">
    </div>
    <div class="form-group my-3">
        <label  class="mb-2" for="exampleInputproduct_availability">product_availability</label  class="mb-2">
        <input type="text" class="form-control" id="exampleInputproduct_availability" aria-describedby="emailHelp"
            placeholder="product_availability" name="product_availability">
    </div>
    <div class="form-group my-3">
        <label  class="mb-2" for="exampleInputimage">image</label  class="mb-2">
        <input type="file" class="form-control" id="exampleInputimage" aria-describedby="emailHelp"
            placeholder="image" name="image">
    </div>
    <label  class="mb-2" class="my-1 mr-2" for="inlineFormCustomSelectPref">Category</label>
    <select name="category_id" class="form-select mb-4 mr-sm-2" id="inlineFormCustomSelectPref">
        <option selected>Choose...</option>
        @foreach($categories as $category)
        <option value="{{$category['id']}}">{{$category['name']}}</option>
        @endforeach
        
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
