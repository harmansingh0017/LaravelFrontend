<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Session;

 use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function index(){
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8080/api/products');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
          $products = json_decode($body, true);
            
          $client1 = new Client();
        $response1 = $client1->request('GET', 'http://127.0.0.1:8080/api/products/view');
        $statusCode1 = $response1->getStatusCode();
        $body1 = $response1->getBody()->getContents();
          $view = json_decode($body1, true);
         // $product = $produc->toArray();
         return view('admin.crudproducts1', [
            "product" => $products,
            "view" => $view,
             ]);   
           
    }

    public function store(){
        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8080/api/products";

 
    $this->validate(request(), [
        'name' => 'required|max:255',
        'price' => 'required|integer',
        'description' => 'required|max:255',
        'discount' => 'required|integer',
        'stock' => 'required|integer',
        'brand' => 'required|max:255',
        'catogery_id' => 'required|integer',
        'supplier_id' => 'required|integer',
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
            'catogery_id'=> request('catogery_id'),
            'supplier_id'=> request('supplier_id'),
            'image'=> request('image'),

             ]
            ]);
            session()->flash('message', '<b>Nice!</b> product is added');
            session()->flash('type', 'success');
            return redirect()->to('/adminview');
    }

    public function aview($id){
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8080/api/products/'.$id);
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
           $product = json_decode($body, true);
           Session::put('id', $product['products']['id']);

         // $product = $produc->toArray();
         return view('admin.aview', [
            "prod" => $product ,
            'id' => $product['products']['id']
             ]);  
    }

    public function delete($id){
        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8080/api/products/delete/";

// this option will also set the 'Content-Type' header.
       $response = $client->post($url.$id);
    
        return redirect()->to('/adminview');
    }

   public function update(){

    $this->validate(request(), [
        'name' => 'required|max:255',
        'price' => 'required|integer',
        'description' => 'required|max:255',
        'discount' => 'required|integer',
        'stock' => 'required|integer',
        'brand' => 'required|max:255',
        'catogery_id' => 'required|integer',
        'supplier_id' => 'required|integer',
        'image' => 'required|max:255'
    ]);



    $id1 = Session::get('id');
     $client = new \GuzzleHttp\Client();
    $url = "http://127.0.0.1:8080/api/products/update";
    $request = $client->post($url,  [
        'json' => [
        'name'=> request('name'),
        'description'=> request('description'),
        'price'=> request('price'),
        'discount'=> request('discount'),
        'stock'=> request('stock'),
        'brand'=> request('brand'),
        'catogery_id'=> request('catogery_id'),
        'supplier_id'=> request('supplier_id'),
        'image'=> request('image'),
        'id'=>$id1

         ]
        ]);
        session()->flash('message', '<b>Nice!</b> product is updated');
        session()->flash('type', 'success');
        return redirect()->to('/adminview');
   }

    public function create(){
        return view('admin.crudproducts');

    }

   
 }
