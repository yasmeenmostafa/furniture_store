@extends('inc.layout')
@section('content')
    <div class="d-flex justify-content-center align-items-center m-5">
        <form method="POST" class="w-75 border border-primary rounded-1 p-4" action="{{ url('register') }}">
            @csrf
            <h1 class="lead text-primary"> Register</h1>

            @include('inc.errors')
            <div class="form-group my-3">
                <label class="mb-2" for="exampleInputname">name</label>
                <input type="text" class="form-control" id="exampleInputname" aria-describedby="nameHelp"
                    placeholder="name" name="name">
            </div>

            <div class="form-group my-3">
                <label class="mb-2" for="exampleInputemail">email</label>
                <input type="text" class="form-control" id="exampleInputemail" aria-describedby="emailHelp"
                    placeholder="email" name="email">
            </div>
            <div class="form-group my-3">
                <label class="mb-2" for="exampleInputpassword">password</label class="mb-2">
                <input type="password" class="form-control" id="exampleInputpassword" aria-describedby="emailHelp"
                    placeholder="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
