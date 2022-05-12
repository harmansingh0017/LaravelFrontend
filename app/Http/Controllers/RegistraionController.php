<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Session;

use GuzzleHttp\Client;


class RegistraionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }
   
    public function create()
    {
        return view('registration.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => ['required' ,'regex:/^[a-zA-Z ]{4,15}$/i'],
            'email' => ['required','email','regex:/(.*)@edu.easj.dk/i','unique:users'],
            'password' => ['required','confirmed','regex:/^[\d\w@-]{8,20}$/i'],
            'campus' => ['required' ,'regex:/^[a-zA-Z ]{6,15}$/i'],
            'phone' => ['required','regex:/^\d{8}$/'],
            'address' => ['required','regex:/^[a-zA-Z\d\.\,\- ]{1,60}$/'],
            'role' => 'required'

        ]);
        
        $user = User::create(request(['name', 'email', 'password','campus','phone','address','role']));
        $role =  User::where('email', request('email') )->where('password', request('password'))->first();
        Session::put('uname', $role['name']);
        Session::put('uaddress', $role['address']);
        Session::put('uphone', $role['phone']);
        Session::put('uemail', $role['email']);
       

        auth()->login($user);
        session()->flash('message', '<b>Nice!</b> You are now registered in');
        session()->flash('type', 'success');
        return redirect()->to('/');
    }
}