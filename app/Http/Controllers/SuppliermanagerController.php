<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use Redirect;




class SuppliermanagerController extends Controller
{
    public function __construct()
    {
            
        $this->middleware('auth');
         
    }

    public function index(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://127.0.0.1:8080/api/suppliers');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
          $suppliers = json_decode($body, true);

          $client1 = new \GuzzleHttp\Client();
        $response1 = $client1->request('GET', 'http://127.0.0.1:8080/api/products/view');
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody()->getContents();
          $view = json_decode($body1, true);
       
        // $product = $produc->toArray();
         return view('admin.deletesupplier', [
            "supplier" => $suppliers,
            "view" => $view
             
             ]);   
           
    }

    public function store(){

        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8080/api/suppliers";

        $this->validate(request(), [
            'suppliername' => ['required' ,'regex:/^[a-zA-Z ]{4,15}$/i'],
            'email' => ['required','email','regex:/(.*)@edu.easj.dk/i'],
            'password' => ['required','regex:/^[\d\w@-]{8,20}$/i'],
            'company' => 'required|max:255',
            'catogery_id' => 'required|integer',
            'phone' => ['required','regex:/^\d{8}$/'],
            'address' => ['required','regex:/^[a-zA-Z\d\.\,\- ]{1,60}$/'],

        ]);

        $userData = User::where('email', request('email'))->where('password', request('password'))->first();
        if($userData['id']){
            $supplier = User::findOrFail($userData['id']);
            $supplier->name = request('suppliername');
            $supplier->email = request('email');
            $supplier->password = request('password');
            $supplier->role = 'supplier';
            $supplier->phone = request('phone');
            $supplier->address = request('address');
            $supplier->id = $userData['id'];
            $supplier->save();

        }
        
        if(!$userData){
            $user = User::create([
                "name" => request('suppliername'),
                "email" => request('email'),
                "password" => request('password'),
                 "phone" => request('phone'),
                "address" => request('address'),
                "role"=> 'supplier'
                 ]);
         }

        $request = $client->post($url,  [
            'json' => [
            'suppliername'=> request('suppliername'),
            'email' => request('email'),
            'password'=> request('password'),
            'company'=> request('company'),
            'catogery_id'=> request('catogery_id'),
            'phone'=> request('phone'),
            'address'=> request('address'),

             ]
            ]);
          
            session()->flash('message', '<b>Nice!</b> supplier is added');
            session()->flash('type', 'success');
            return redirect()->to('/suppliermanagerview');
    }

    public function suview($id){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://127.0.0.1:8080/api/suppliers/'.$id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
           $product = json_decode($body, true);
           Session::put('id', $product['suppliers']['id']);
           Session::put('email', $product['suppliers']['email']);
           Session::put('password', $product['suppliers']['password']);


         // $product = $produc->toArray();
         return view('admin.updatesupplier', [
            "prod" => $product ,
            'id' => $product['suppliers']['id']
             ]);  
    }

    public function delete($id){
        $userData = User::where('email', Session::get('email') )->where('password', Session::get('password'))->first();
        $supplier = User::findOrFail($userData['id']);
        $supplier->delete();
        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8080/api/suppliers/delete/";
      
// this option will also set the 'Content-Type' header.
       $response = $client->post($url.$id);
    
        return redirect()->to('/suppliermanagerview');
    }

 

    public function update(){

        $id1 = Session::get('id');

          $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8080/api/suppliers/update";
  
        
        $this->validate(request(), [
            'suppliername' => ['required' ,'regex:/^[a-zA-Z ]{4,15}$/i'],
            'email' => ['required','email','regex:/(.*)@edu.easj.dk/i'],
            'password' => ['required','regex:/^[\d\w@-]{8,20}$/i'],
            'company' => 'required|max:255',
            'catogery_id' => 'required|integer',
            'phone' => ['required','regex:/^\d{8}$/'],
            'address' => ['required','regex:/^[a-zA-Z\d\.\,\- ]{1,60}$/'],
        ]);

        $request = $client->post($url,  [
            'json' => [
            'suppliername'=> request('suppliername'),
            'company'=> request('company'),
            'email'=> request('email'),
            'password'=> request('password'),
            "phone" => request('phone'),
            "address" => request('address'),
            'catogery_id'=> request('catogery_id'),
            'id'=> $id1,
             ]
            ]);

            $userData = User::where('email', Session::get('email') )->where('password', Session::get('password'))->first();
           

        $supplier = User::findOrFail($userData['id']);
        $supplier->name = request('suppliername');
        $supplier->email = request('email');
        $supplier->password = request('password');
        $supplier->role = 'supplier';
        $supplier->phone = request('phone');
        $supplier->address = request('address');
        $supplier->id = $userData['id'];
  
  
    
        $supplier->save();

            session()->flash('message', '<b>Nice!</b> supplier is updated');
            session()->flash('type', 'success');
            return redirect()->to('/suppliermanagerview');
       }

    public function create(){
        return view('admin.createsupplier');

    }

 }
