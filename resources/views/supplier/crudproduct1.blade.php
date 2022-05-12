@extends('layouts.app')

@section('content')


<div class="add-product">
      <a href="/supplier">Add new product</a>
</div>

<div class="d-flex flex-wrap">

    @if (is_array($product) || is_object($product))
    @foreach($product['products'] as $produc)

    <a href="/supplierview/{{ $produc['id'] }}">

    <div class="d-flex flex-lg-wrap">
      <div class="test">
        <img src="{{ $produc['image'] }}" style="height: 200px" ></img>
        <div class="all-info">Name - {{ $produc['name'] }}</div>
        <div class="all-info">Description - {{ $produc['description'] }}</div>
        <div class="all-info">Price - {{ $produc['price'] }} kr</div>
        </a>
        <form action="/supplierview/{{ $produc['id'] }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-btn">Delete product</button>
          </form>
</div>
</div>

@endforeach
@endif
</div>
@endsection

