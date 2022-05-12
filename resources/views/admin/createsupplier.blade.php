@extends('layouts.app')

@section('content')
<div class="create-header">Create a new supplier</div>
    <form id="create-form" method="POST" action="/suppliermanager">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="suppliername" name="suppliername" placeholder="Supplier name..">
        </div>
        @error('suppliername')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Supplier email..">
        </div>
        @error('email')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Supplier password..">
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
            <input type="text" class="form-control" id="company" name="company" placeholder="Supplier company..">
        </div>
        @error('company')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <fieldset>
      <label>Catogery:</label>
      <input type="checkbox" name="catogery_id" value="1">cloth</input>
      <input type="checkbox" name="catogery_id" value="2">food</input>
      <input type="checkbox" name="catogery_id" value="3">equipment</input>
     </fieldset>

        
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
 
     </form>
 
     @endsection
