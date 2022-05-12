@extends('layouts.app')

@section('content')
        <h2 class="update-header">Admin update product</h2>
            <div class="content">
                     <div class="update-item">
                     <img src="{{ $prod['products']['image'] }}" style="height: 300px" >
                     <div class="update-info">Product ID - {{$id}}</div>
                   <div class="update-info">Product name - {{ $prod['products']['name'] }}</div>
                  <div class="update-info">Product description - {{ $prod['products']['description'] }}</div>
                  <div class="update-info">Product price - {{ $prod['products']['price'] }}</div>
                  <div class="update-info">Product stock - {{ $prod['products']['stock'] }}</div>
                  <div class="update-info">Product discount - {{ $prod['products']['discount'] }}</div>
                  <div class="update-info">Product brand - {{ $prod['products']['brand'] }}</div>
                  </div>
                 
            </div>
            <h2 class="update-product">Insert new values for product</h2>

            <form id="update-form" method="POST" action="/admin/update">
            {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="New product name..">
        </div>
        @error('name')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="text" class="form-control" id="description" name="description" placeholder="New product description..">
        </div>
        @error('description')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="New product price..">
        </div>
        @error('price')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="discount" name="discount" placeholder="New product discount..">
        </div>
        @error('discount')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="stock" name="stock" placeholder="New product stock..">
        </div>
        @error('stock')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="image" name="image" placeholder="New product image..">
        </div>
        @error('image')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="brand" name="brand" placeholder="New product brand..">
        </div>
        @error('brand')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        
        <div class="form-group">
            <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="New product supplier..">
        </div>
        @error('supplier_id')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
             <fieldset>
      <label>Catogery:</label>
      <input type="checkbox" name="catogery_id" value="1">Cloth</input>
      <input type="checkbox" name="catogery_id" value="2">Food</input>
      <input type="checkbox" name="catogery_id" value="3">Equipment</input>
     </fieldset>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
 
     </form>
 
                  @endsection
