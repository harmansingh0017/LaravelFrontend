@extends('layouts.app')

@section('content')
<div class="view-header">Top products of the week</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
       <th scope="col">Products</th>
      <th scope="col">Total Review</th>
     </tr>
  </thead>
  <tbody>
  @foreach($view['products'] as $produc)
    <tr>
       <td>{{$produc['name']}}</td>
       <td>{{$produc['COUNT']}}</td>
      </tr>
     @endforeach
  </tbody>
</table>

<div class="add-product">
      <a href="/admin">Add new product</a>
</div>


<div class="d-flex flex-wrap ">
        @if (is_array($product) || is_object($product))
        @foreach($product['products'] as $produc)
          <a href="/adminview/{{ $produc['id'] }}">
            <div class="d-flex flex-lg-wrap oShadow ">
              <div class="test">
                  <img src="{{ $produc['image'] }}" style="height: 200px" ></img>
                  <div class="all-info">Name - {{ $produc['name'] }}</div>
                  <div class="all-info">Description - {{ $produc['description'] }}</div>
                  <div class="all-info">Price - {{ $produc['price'] }} kr</div>
                  </a>
                  <form action="/adminview/{{ $produc['id'] }}" method="POST">
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

