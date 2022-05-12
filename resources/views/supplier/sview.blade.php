@extends('layouts.app')

@section('content') 
            <div class="content">
                     <div class="update-item">
                     <div class="update-header"> {{ auth()->user()->name }}' update product</div>
                     <img src="{{ $prod['products']['image'] }}" style="height: 200px" >
                     <div class="update-info">Product ID - {{$id}}</div>
                   <div class="update-info">Product name - {{ $prod['products']['name'] }}</div>
                  <div class="update-info">Product description - {{ $prod['products']['description'] }}</div>
                  <div class="update-info">Product price - {{ $prod['products']['price'] }}</div>
                  <div class="update-info">Product stock - {{ $prod['products']['stock'] }}</div>
                  <div class="update-info">Product discount - {{ $prod['products']['discount'] }}</div>
                  <div class="update-info">Product brand - {{ $prod['products']['brand'] }}</div>

                  </div>
                 
            </div>

            <div class="update-product">Insert new values for product</div>

            <form id="update-form" method="POST" action="/supplier/update">
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
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
 
     </form>
            @include('partials.formerrors')

                  @endsection
