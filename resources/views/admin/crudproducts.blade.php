@extends('layouts.app')

@section('content')

    
    <h2 class="create-header">Add new product as admin</h2>
    <form id="create-form" method="POST" action="/admin">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Product name..">
        </div>
        @error('name')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
        <div class="form-group">
            <input type="text" class="form-control" id="description" name="description" placeholder="Product description..">
        </div> @error('description')
             <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        <div class="form-group">
            <input type="text" class="form-control" id="price" name="price" placeholder="Product price..">
        </div>
        @error('price')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount..">
        </div>
        @error('discount')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="stock" name="stock" placeholder="How many you want to add to stock..">
        </div>
        @error('stock')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="image" name="image" placeholder="Product image..">
        </div>
        @error('image')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="brand" name="brand" placeholder="Product brand..">
        </div>
        @error('brand')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        
        <div class="form-group">
            <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="Product supplier..">
        </div>
        @error('supplier_id')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
    <fieldset>
      <label>Catogery:</label>
      <input class="dinso" type="checkbox" name="catogery_id" value="1">Cloth</input>
      <input type="checkbox" name="catogery_id" value="2">Food</input>
      <input type="checkbox" name="catogery_id" value="3">Equipment</input>
     </fieldset>
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
 
     </form>
 
     @endsection
