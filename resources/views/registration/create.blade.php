@extends('layouts.app')

@section('content')
    <h2 id="log">Register</h2>
    <form id="update-form" method="POST" action="/register">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name..">
        </div>
        @error('name')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email..">
        </div>
        @error('email')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
 
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password..">
        </div>
        @error('password')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation" placeholder="Confirm password..">
        </div>
        @error('password_confirmation')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number..">
        </div>
        @error('phone')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="address" name="address" placeholder="Address..">
        </div>
        @error('address')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
            <input type="text" class="form-control" id="campus" name="campus" placeholder="Campus..">
        </div>
        @error('campus')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror

        <div class="form-group">
             <input type="hidden" value="user" class="form-control" id="role" name="role">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
 
     </form>
     @endsection
