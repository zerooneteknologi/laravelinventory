<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Suplayer;
use Barryvdh\DomPDF\Facade\Pdf;
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
            'suplayerId' => $request->suplayerId,
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

        return redirect()->route('printPO', ['id' => $purchase]);
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
            'orders' => Order::where('purchaseId', $purchase->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('warehouse.po.edit', [
            'purchase' => $purchase,
            'orders' => Order::where('purchaseId', $purchase->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        foreach ($request->orderId as $key => $order) {
            Order::where('id', $order)->update([
                'qty' => $request->qty[$key],
                'subTotal' => $request->qty[$key] * $request->purchasePrice[$key],
            ]);
        };

        foreach ($request->productId as $key => $product) {
            $qtys = Product::where('id', $product)->get('stock');
            foreach ($qtys as $qty) {
                Product::where('id', $product)->update([
                    'stock' => $qty->stock + $request->qty[$key],
                    'purchasePrice' => $request->purchasePrice[$key]
                ]);
            }
        };

        Purchase::where('id', $purchase->id)->update([
            'payTotal' => Order::where('purchaseId', $purchase->id)->sum('subTotal'),
            'status' => 'Succes'
        ]);

        return redirect('/purchase');
    }

    public function checksuplayer(Request $request)
    {
        return response()->json([
            'data' => Product::where('suplayerId', $request->id)->get()
        ]);
    }

    public function getPurchase()
    {
        return response()->json([
            'data'
        ]);
    }

    /**
     * print PO
     */
    public function printPO($id)
    {
        return view('warehouse.po.invoice', [
            'purchasies' => Purchase::where('id', $id)->get(),
            'orders' => Order::where('purchaseId', $id)->get(),
            'companies' => Company::all()
        ]);
    }

    /**
     * get data Order
     */
    public function getOrder(Request $request)
    {
        return response()->json([
            'order' => Order::where('purchaseId', $request->id)->get()
        ]);
    }

    /**
     * get data product
     */
    public function getProduct(Request $request)
    {
        return response()->json([
            'product' => Product::where('id', $request->id)->get()
        ]);
    }
}
