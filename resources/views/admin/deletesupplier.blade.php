@extends('layouts.app')

@section('content')
<div class="view-header">Top suppliers of the week</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
       <th scope="col">Supplier Name</th>
      <th scope="col">Total Products</th>
     </tr>
  </thead>
  <tbody>
  @foreach($view['suppliers'] as $produc)
    <tr>
       <td>{{$produc['suppliername']}}</td>
       <td>{{$produc['COUNT']}}</td>
      </tr>
     @endforeach
  </tbody>
</table>

<div class="add-product">
      <a href="/suppliermanager">Add new supplier</a>
</div>


<div class="d-flex flex-wrap">

  @if (is_array($supplier) || is_object($supplier))
  @foreach($supplier['suppliers'] as $produc)

  <a href="/suppliermanagerview/{{ $produc['id'] }}">

  <div class="d-flex flex-lg-wrap oShadow">
    <div class="test">
  <div class="all-info">Name - {{ $produc['suppliername'] }}</div>
  <div class="all-info">Email - {{ $produc['email'] }}</div>
  <div class="all-info">Company - {{ $produc['company'] }}</div>
  </a>

  

    </div>
    </div>
@endforeach
@endif

</div>
@endsection

