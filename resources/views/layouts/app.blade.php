<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zealand Webshop</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="/css/main.css" rel="stylesheet">
        <link href="/css/adem.css" rel= "stylesheet">
       <link href="/css/oliver.css" rel= "stylesheet">
    </head>
<body>
    
    <nav class="navbar">

    <a class="navbar-brand" href="/">Zealand</a>
 
    <div class="ko">
        <ul class="nav justify-content-center">
          @if( auth()->check() )
             <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="">Hi {{ auth()->user()->name }}</a>
                </li> 
                @endif
                 <li class="nav-item">
                <a class="nav-link" href="/">Products</a>
              </li>
              @if( auth()->check() )
              @if( auth()->user()->role === 'supplier' )
                <li class="nav-item">
                    <a class="nav-link" href="/supplierview">Supplier's products view</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/cart">Cart</a>
                 </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
                @endif
                @if( auth()->user()->role === 'admin' )
                <li class="nav-item">
                    <a class="nav-link" href="/suppliermanagerview">All Suppliers View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/adminview">All Products View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
                @endif
                @if( auth()->user()->role === 'user' )
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>


@include('partials.flash')

        <main class="py-4"  >
            @yield('content')
  

        </main>


             
        <div id="page-container">
  <div id="content-wrap">
   </div>
  <footer>
       <p>COPYRIGHT TO OMAH 2020</p>
     </footer>
   </div>
       

</body>
</html>
