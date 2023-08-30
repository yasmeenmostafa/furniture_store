<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body class="vh-100  ">

    <nav class="navbar w-100 navbar-expand-lg navbar-dark  position-fixed position-absolute top-0 ">
        <a class="navbar-brand ps-5" href="#">Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">HOME <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('showcart')}}">CART</a>
                </li>
               
                @if (Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('profile') }}">PROFILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('orders') }}">YOUR ORDERS</a>
                    </li>
                @endif

            </ul>
            <form class="d-flex ms-auto me-4" method="POST" action="{{ url('search') }}">
                @csrf
                <input class="form-control me-2" name="text" type="search" placeholder="Product Search"
                    aria-label="Search">

                <button class="btn btn-outline-light px-5" type="submit">Search</button>
            </form>

            @if (Auth::user())
                <a href="{{ url('logout') }}" class="btn btn-outline-danger me-2" type="submit">logout</a>
            @endif
            @if (!Auth::user())
                <a href="{{ url('registerform') }}" class="btn btn-primary ms-auto me-2" type="submit">register</a>
                <a href="{{ url('loginform') }}" class="btn btn-primary  me-2" type="submit">login</a>
            @endif



        </div>
    </nav>