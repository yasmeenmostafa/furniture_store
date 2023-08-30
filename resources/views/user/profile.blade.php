@extends('user.inc.layout')
@section('content')
    <section class="w-100 vh-100 d-flex justify-content-center align-items-center   bg-light">
        <div class="bg-white shadow-lg rounded-0 p-5">
            
            <p class=" lead">name:{{Auth::user()->name}}</p>
            <p class=" lead">email:{{Auth::user()->email}}</p>
           
            
        </div>
       
    </section>




@endsection
