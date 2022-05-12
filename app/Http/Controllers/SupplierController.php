<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Session;

 use Auth;

class SupplierController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index(){
        $client = new Client();
        $user = Session::get('s_id');
        $response = $client->request('GET', 'http://127.0.0.1:8080/api/products/supplier/'.$user);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
          $products = json_decode($body, true);
        // $product = $produc->toArray();
         return view('supplier.crudproduct1', [
            "product" => $products
             ]); 
    }

    public function store1(){
        $client = new \GuzzleHttp\Client();
        $user = Session::get('s_id');
         $catogery_id = Session::get('catogery_id');

        //dd($user);
        $url = "http://127.0.0.1:8080/api/products";

        $this->validate(request(), [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required|max:255',
            'discount' => 'required|integer',
            'stock' => 'required|integer',
            'brand' => 'required|max:255',
              'image' => 'required|max:255'
        ]);

        $request = $client->post($url,  [
            'json' => [
            'name'=> request('name'),
            'description'=> request('description'),
            'price'=> request('price'),
            'discount'=> request('discount'),
            'stock'=> request('stock'),
            'brand'=> request('brand'),
            'catogery_id'=> $catogery_id,
            'supplier_id'=> $user,
            'image'=> request('image'),

             ]
            ]);
            session()->flash('message', '<b>Nice!</b> product is added');
            session()->flash('type', 'success');
            return redirect()->to('/supplierview');
    }
     
    public function delete1($id){
        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8080/api/products/delete/";

// this option will also set the 'Content-Type' header.
       $response = $client->post($url.$id);
    
        return redirect()->to('/supplierview');
    }
     
    public function update1(){

        $id1 = Session::get('id');
        $id2 = Session::get('s_id');
        $catogery_id = Session::get('catogery_id');

       
         $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8080/api/products/update";
 
        $this->validate(request(), [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'description' => 'required|max:255',
            'discount' => 'required|integer',
            'stock' => 'required|integer',
            'brand' => 'required|max:255',
              'image' => 'required|max:255'
        ]);

        $request = $client->post($url,  [
            'json' => [
            'name'=> request('name'),
            'description'=> request('description'),
            'price'=> request('price'),
            'discount'=> request('discount'),
            'stock'=> request('stock'),
            'brand'=> request('brand'),
            'catogery_id'=> $catogery_id,
            'supplier_id'=> $id2,
            'image'=> request('image'),
            'id'=>$id1
    
             ]
            ]);
            session()->flash('message', '<b>Nice!</b> product is updated');
            session()->flash('type', 'success');
            return redirect()->to('/supplierview');
       }
    public function supplierview($id){
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8080/api/products/'.$id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
           $product = json_decode($body, true);
           Session::put('id', $product['products']['id']);

         // $product = $produc->toArray();
         return view('supplier.sview', [
            "prod" => $product ,
            'id' => $product['products']['id']
             ]);  
    }


    public function create(){
        
        return view('supplier.crudproduct');

    }


   
}
