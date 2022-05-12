<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use GuzzleHttp\Client;
use Session;



class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('sessions.create');
    }
    
    
     public function store()
    {
     
 
    $this->validate(request(), [
        'email' => 'required',
        'password' => 'required'
    ]);

    $userData = User::where('email', request('email') )->where('password', request('password'))->first();
    if(!$userData){
        return back()->withErrors([
            'message' => 'The email or password is incorrect, please try again'
        ]);
    }

    $client = new Client();
    $response = $client->request('GET', 'http://127.0.0.1:8080/api/suppliers/'.request('email').'/'.request('password'));
    $statusCode = $response->getStatusCode();
    $body = $response->getBody()->getContents();
       $product = json_decode($body, true);
       //print_r($product['suppliers']['id']);
       $supplier = $product['suppliers']['id'];
       $catogery = $product['suppliers']['catogery_id'];
          Session::put('s_id', $supplier);
        Session::put('catogery_id', $catogery);
        



       //for retreiving
       //$value = session('key');

      $role =  User::where('email', request('email') )->where('password', request('password'))->first();
       Session::put('uname', $role['name']);
       Session::put('uaddress', $role['address']);
       Session::put('uphone', $role['phone']);
       Session::put('uemail', $role['email']);


        if(!Auth::loginUsingId($userData->id))
        {
          return back()->withErrors([
              'message' => 'The email or password is incorrect, please try again'
          ]);
        }
        return redirect()->to('/product');
        }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/product');
    }
 }
