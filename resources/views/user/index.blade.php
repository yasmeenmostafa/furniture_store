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

<body>

    <header id='home' class=" position-relative text-white w-100 vh-100 d-flex justify-content-center align-items-center rounded-0">
        <nav class="navbar w-100 navbar-expand-lg navbar-dark  position-fixed position-absolute top-0 " >
            <a class="navbar-brand ps-5" href="#">Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">HOME <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#shop">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('showcart')}}">CART</a>
                    </li>
                    @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('profile')}}">PROFILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('orders') }}">YOUR ORDERS</a>
                    </li>
                    @endif
                   
                </ul>
                <form class="d-flex ms-auto me-4" method="POST" action="{{url('search')}}">
                    @csrf
                    <input class="form-control me-2" name="text" type="search" placeholder="Product Search" aria-label="Search">
                   
                    <button class="btn btn-outline-light px-5" type="submit">Search</button>
                </form>
               
                @if(Auth::user())
                <a href="{{url('logout')}}" class="btn btn-outline-danger me-2"  type="submit">logout</a>
                    
                @endif
                @if(!Auth::user())
                <a href="{{url('registerform')}}" class="btn btn-primary ms-auto me-2"  type="submit">register</a>
                <a href="{{url('loginform')}}" class="btn btn-primary  me-2"  type="submit">login</a>
                    
                @endif
    
    
    
            </div>
        </nav>
        <div>
            <h1>WE CARRY ONLY THE FINEST</h1>
            <h2 class="text-center fs-5 fw-bold ">ITEMS AVAILABLE</h2>
        </div>

    </header>
    <section  id='shop' class="py-5 row align-items-center g-4 container m-auto ">
        @foreach($products as $product)
            
        
        <div class="col-md-3" >
            <div class="position-relative overflow-hidden "id="product">
            <img src="{{ asset('images/'.$product->image) }}" height="330px" class="w-100" alt="">
            <div id="link" class="position-absolute bg-danger bg-dark opacity-50 w-100 top-100 h-100 d-flex justify-content-center align-items-center">
                <a href="{{url('product/'.$product->id)}}" class="text-decoration-none text-white "> show product</a>

            </div>
            </div>
        </div>
        @endforeach
    </section>

    <section id="section" class="  text-white w-100  d-flex justify-content-center align-items-center rounded-0">
        <div class="text-center">
            <h1 class="text-center">MOST POWERFUL CONCEPT</h1>
           <p class="lead text-center m-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. <br>Cum sociis natoque penatibus et magnis dis parturient</p>
           <button class="btn btn-light rounded-0 p-3 mt-3 m-auto text-center"> PERCHASE</button>
        </div>

    </section>
    <footer class="bg-light text-dark d-flex justify-content-center align-items-center py-5 w-100">
        <p> @Copyrights,All rights Reserved</p>
    </footer>
</body>

</html>
