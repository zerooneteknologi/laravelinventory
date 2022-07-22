<?php

namespace App\Http\Controllers;

use App\Models\DrafProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Suplayer;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        return view('warehouse.po.purchase', [
            'purchases' => Purchase::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.po.create', [
            'suplayers' => Suplayer::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = Purchase::insertGetId([
            'purchaseNo' => $request->purchaseNo,
            'date' => now(),
            'payTotal' => $request->payTotal
        ]);

        foreach ($request->productId as $key => $productId) {
            Order::insert([
                'purchaseId' => $purchase,
                'productId' => $productId,
                'qty' => $request->qty[$key],
                'subTotal' => $request->subTotal[$key]
            ]);
        }
        return redirect('/purchase');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('warehouse.po.show', [
            'purchase' => $purchase,
            'orders' => Order::where('purchaseId', $purchase->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    public function checksuplayer(Request $request)
    {
        return response()->json([
            'data' => Product::where('suplayerId', $request->id)->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
