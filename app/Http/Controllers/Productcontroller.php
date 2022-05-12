<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;


 use GuzzleHttp\Client;

 use Session;

 use Auth;

 

class Productcontroller extends Controller
{
  //we get id from clicking single item in product via href which pass is in url somthing like /products/{product_id}
  public function store($id){
    $client = new Client();
    $response = $client->request('GET', 'http://127.0.0.1:8080/api/products/'.$id);
    $statusCode = $response->getStatusCode();
    $body = $response->getBody()->getContents();
       $product = json_decode($body, true);
       $id = $product['products']['id'];
       $name = $product['products']['name'];
       $price = $product['products']['price'];
       $catogery = $product['products']['catogery_id'];
      
       $client1 = new Client();
  $response = $client1->request('GET', 'http://127.0.0.1:8080/api/products/catogories/'.$catogery);
  $statusCode = $response->getStatusCode();
  $body = $response->getBody()->getContents();
  //decode json file into php objects
     $catogery = json_decode($body, true);

      //for adding item to cart table 
      if(Auth::user()){
        $un = Auth::user()->id;
        $users = User::select('name')->where('id', $un)->first();
        
        Session::put('id', $id);
        Session::put('name', $name);
        Session::put('price', $price);
       Session::put('un', $users);
       Session::put('u_id', $un);

       }
       

     // $product = $produc->toArray();
     //prod is double dimensional array
     return view('detailproduct', [
        "prod" => $product ,
        'id' => $product['products']['id'],
        'cato' => $catogery
         ]);  
}



//Review
public function createstore(){
     
 
  $client = new \GuzzleHttp\Client();
  $url = "http://127.0.0.1:8080/api/reviews";
   $idd = Session::get('id');
  $user = Session::get('un');
      $muser = $user['name'];
      $this->validate(request(), [ 'review' => 'required',]);
    
  $request = $client->post($url,  [
     'json' => [
     'review'=> request('review'),
     'product_id'=> $idd,
      'username'=> "$muser"
      ]
     ]);
     return redirect()->to('/product/'.$idd);

 }






    public function index()
    {       
            $client = new Client();
            $response = $client->request('GET', 'http://127.0.0.1:8080/api/products');
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
              $products = json_decode($body, true);

             
              if(Auth::user()){
                $un = Auth::user()->id;
                $users = User::select('name')->where('id', $un)->first();
               
               Session::put('un', $users);
               Session::put('u_id', $un);
    
               }
            // $product = $produc->toArray();
             return view('products', [
                "product" => $products
                 ]);   
               
             } 

             public function  createcart(){

              $name1 = Session::get('name');
              $price1 = Session::get('price');
              $idd = Session::get('id');
              $uid =   Session::get('u_id');
          
              $cart = new Cart();
              $this->validate(request(), [ 'no_items' => 'required|integer',]);
              
              $cart->no_items = request('no_items'); //number of items added
              $cart->price = $price1;
              $cart->name = "$name1";
              $cart->user_id = $uid;
          
             
              $cart->save();
              session()->flash('message', '<b>Nice!</b> Item is added to cart');
              session()->flash('type', 'success');
              return redirect()->to('/product/'.$idd);
            }

   


     public function allcatogery(){
       return view('welcome');
     }

     public function catogery($id){
      $client = new Client();
      $response = $client->request('GET', 'http://127.0.0.1:8080/api/products/catogories/'.$id);
      $statusCode = $response->getStatusCode();
      $body = $response->getBody()->getContents();
         $product = json_decode($body, true);
          

         if(Auth::user()){
          $un = Auth::user()->id;
          $users = User::select('name')->where('id', $un)->first();
          
          
         Session::put('un', $users);
         Session::put('u_id', $un);

         }
         

       // $product = $produc->toArray();
       return view('catogery', [
          "prod" => $product 
            ]);  

     }
 }
