<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index(){
        $uid =   Session::get('u_id');
          $cart = Cart::all()->where('user_id', $uid);
          $itemtotal = 0;
          foreach($cart as $produ){
              
            $itemtotal += ($produ['price']*$produ['no_items']);
            }
         
           return view('cart',
        ['cart' => $cart ,
        'total' => $itemtotal],
        ['name' => Session::get('uname'),
        'address' => Session::get('uaddress'),
        'phone' => Session::get('uphone'),
        'email' => Session::get('uemail') ] 
        );
    }

    public function delete($id){
        $cartd = Cart::whereId($id)->first();
        
        $cartd->delete();
        session()->flash('message', '<b>Nice!</b>Item is removed from cart');
        session()->flash('type', 'success');
        return redirect()->to('/cart');
    }

    public function create(){
        session()->flash('message', '<b>Nice!</b> your item is placed succesfully');
        session()->flash('type', 'success');
        return redirect()->to('/cart');

    }
 }
