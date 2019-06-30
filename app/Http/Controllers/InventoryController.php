<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('inventory.form_new',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = array();

        for ($i = 0; $i < count($request->product_id); $i++) {
            $inventory[] = [
                'product_id' => $request->product_id[$i],
                'lot' => $request->lot[$i],
                'quantity' => $request->quantity[$i],
                'quantity_original' => $request->quantity[$i],
                'price' => $request->price[$i],
                'expiration' => $request->expiration[$i],
            ];
        }

        Inventory::insert($inventory);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }

    public function welcome()
    {
        $products = InventoryController::getAvailableProducts();

        return view('inventory.welcome',compact('products'));
    }

    public function getAvailableProducts()
    {
        $date = Carbon::now()->addDays(10);

        $products = DB::table('products AS p')
                                    ->join('inventories AS i', 'p.id', '=', 'i.product_id')
                                    ->select('p.id','p.name','i.price', DB::raw('SUM(quantity) as total'))
                                    ->whereDate('i.expiration', '>=',$date)
                                    ->where('i.quantity','>',0)
                                    ->groupBy('p.id','p.name','i.price')
                                    ->get();
         return $products;
    }

    static function getQuantityAvailableByProductAndPrice($product_id,$price)
    {
        $date = Carbon::now()->addDays(10);
        $inventoryProduct = null;
        $quantity = 0;
        $inventoryProduct = DB::table('products AS p')
                                    ->join('inventories AS i', 'p.id', '=', 'i.product_id')
                                    ->select('p.id','p.name','i.price', DB::raw('SUM(quantity) as total'))
                                    ->whereDate('i.expiration', '>=',$date)
                                    ->where('p.id',$product_id)
                                    ->where('i.price',$price)
                                    ->groupBy('p.id','p.name','i.price')
                                    ->first();

        if ($inventoryProduct != null) {
            $quantity = $inventoryProduct->total;
        }

        return (int) $quantity;
    }

    static function discountInventory($product_id,$price,$cant)
    {
        
        $date = Carbon::now()->addDays(10);
        $inventoryProduct = Inventory::where('product_id',$product_id)
                        ->where('price',$price)
                        ->where('quantity','>',0)
                        ->whereDate('expiration', '>=',$date)
                        ->orderBy('expiration', 'asc')->first();

        $inventoryProduct->quantity = $inventoryProduct->quantity - $cant;
        $inventoryProduct->save();

        return $inventoryProduct;
    }

}
