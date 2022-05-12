@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Categorized Products</h1>
        <div class="content" id="productGrid">


            @if (is_array($prod) || is_object($prod))
            @foreach($prod['catogories'] as $produc)

            <div class="card oShadow" style="width: 22rem;" id="productMargin">
            <a href="/product/{{ $produc['id'] }}" style="color: black; text-decoration: none;">


                <img class="card-img-top" src="{{ $produc['image'] }}" style="height: 280px; object-fit: cover;" >
                <div class="card-body" id="productDesc">

                    <h3>{{ $produc['name'] }}</h3>
                    <p>{{ $produc['description'] }}</p>
                    <h4>{{ $produc['price'] }} Kr.</h4>
                </div>
            </a>
        </div>



    @endforeach
    @endif
        </div>
    </div>
    @endsection
