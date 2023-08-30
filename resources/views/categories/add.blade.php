@extends('inc.layout')
@section('content')
<div class="d-flex justify-content-center align-items-center m-5">
<form method="POST" class="w-75 border border-primary rounded-1 p-4" action="{{url('categories/insert')}}">
    @csrf
    <h1 class="lead text-primary"> Add category</h1>

@include('inc.errors')

    <div class="form-group my-3">
        <label class="mb-2" for="exampleInputproduct_name">Category name</label>
        <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp"
            placeholder="categoryname" name="name">
    </div>
  
    
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
@endsection
