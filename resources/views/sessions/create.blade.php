@extends('layouts.app')

@section('content')
 
    <h2 id="log">Log In</h2>
    
    <form id="update-form" method="POST" action="/login">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email..">
        </div>
 
        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password..">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
        </div>
        @include('partials.formerrors')

     </form>
 
@endsection