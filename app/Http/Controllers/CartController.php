<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Product;
use App\Invoice;
class CartController extends Controller
{
    public function __construct()
    {
        
        if(!\Session::has('cart')) \Session::put('cart',array());
        $this->middleware(['auth'])->only(['checkout']);
        
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
        $units =InventoryController::getQuantityAvailableByProductAndPrice($product->id,$price);
        $product->total = $units;
    	$cart[$product->id] = $product;
    	\Session::put('cart',$cart);
        \Session::flash('message','Elemento agregado Correctamente');
    	return redirect()->route('cart-show');
    }

    public function delete(Product $product)
    {
        $cart = \Session::get('cart');
        unset($cart[$product->id]);
        \Session::put('cart',$cart);
        \Session::flash('message','Elemento removido Correctamente');
        return redirect()->route('cart-show');
    }

    public function checkout(Request $request)
    {
        
        $cart = \Session::get('cart');

        $invoice = $request->user()->invoices()->create([
                            'total' => $request->totalAux
        ]);

        foreach ($cart as $product) {
           $quantity = $request[$product->id];
           $price = $request['price'.$product->id];
           $price = str_replace('$', '', $price);
           $inventoryProduct = InventoryController::discountInventory($product->id,$price,$quantity);
           $invoice->details()->create([
                            'quantity' => $quantity,
                            'inventory_id' => $inventoryProduct->id,
            ]);
        }

        \Session::forget('cart');
        return redirect()->route('cart-show');
    }


   

}
