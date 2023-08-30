@extends('inc.layout')
@section('content')
<div class="d-flex justify-content-center align-items-center m-5">
<form method="POST" class="w-75 border border-primary rounded-1 p-4" action="{{url('categories/update/'.$category['id'])}}">
    @csrf
    <h1 class="lead text-primary"> edit Category</h1>

@include('inc.errors')

    <div class="form-group my-3">
        <label class="mb-2" for="exampleInputcategory_name">category_name</label>
        <input type="text" class="form-control" id="exampleInputcategory_name" aria-describedby="emailHelp"
            placeholder="category_name" name="name" value="{{$category['name']}}">
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection