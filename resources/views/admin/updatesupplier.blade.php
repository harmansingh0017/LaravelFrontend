@extends('layouts.app')

@section('content') 
            <div class="content">
                     <div class="update-item">
                     <div class="update-header">Supplier information</div>
                   <div class="update-info">Supplier name - {{ $prod['suppliers']['suppliername'] }}</div>
                  <div class="update-info">Supplier email - {{ $prod['suppliers']['email'] }}</div>
                  <div class="update-info">Supplier company - {{ $prod['suppliers']['company'] }}</div>
                  <div class="update-info">Supplier ID - {{$id}}</div>
                  </div> 
                  <form action="/suppliermanager/{{ $prod['suppliers']['id'] }}" method="POST">
                     @csrf
                      @method('DELETE')
                     <button class="delete-btn" style="margin: 10px 720px;">Delete</button>
                   </form>
            </div>

            <div class="update-product">Insert new values for supplier</div>

            <form id="update-form" method="POST" action="/suppliermanager/update">
            {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="suppliername" name="suppliername" placeholder="New supplier name..">
        </div>
        @error('suppliername')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="New supplier email..">
        </div>
        @error('email')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="New supplier password..">
        </div>
        @error('password')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <div class="form-group">
            <input type="text" class="form-control" id="address" name="address" placeholder="Supplier address..">
        </div>
        @error('address')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

             <div class="form-group">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Supplier phonenumber..">
        </div>
        @error('phone')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="company" name="company" placeholder="New supplier company..">
        </div>
        @error('company')
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
     </form> 
                  @endsection
