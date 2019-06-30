<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Product;

class CartController extends Controller
{
    public function __construct()
    {
        
        if(!\Session::has('cart')) \Session::put('cart',array());
        
    }

    // Shoe cart

    public function show()
    {
    	$cart = \Session::get('cart');
    	return view('cart.show',compact('cart'));
    }

    public function add(Product $product,$price)
    {

    	$cart = \Session::get('cart');
        $product->cantidad = 1;
    	$product->price = $price;
    	$cart[$product->id] = $product;
    	\Session::put('cart',$cart);
        \Session::flash('message','Elemento agregado Correctamente');
    	return redirect()->route('cart-show');
    }


   

}
