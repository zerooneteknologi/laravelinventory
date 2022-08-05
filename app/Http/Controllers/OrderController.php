<?php

namespace App\Http\Controllers;

use App\Models\DrafProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warehouse.po.table', [
            'drafProducts' => DrafProduct::all(),
            'sum' => DrafProduct::sum('total')
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
        DrafProduct::insert([
            'productId' => $request->productId,
            'productCode' => $request->productCode,
            'productName' => $request->productName,
            'price' => $request->purchasePrice,
            'qty' => $request->qty,
            'total' => $request->subTotal
        ]);
    }

    public function drafproduct(Request $request)
    {
        return response()->json([
            'drafproduct' => DrafProduct::where('id', $request->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DrafProduct  $drafProduct
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        DrafProduct::where('id', $id)->update([
            'qty' => $request->qty,
            'total' => $request->subTotal
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrafProduct  $drafProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DrafProduct::where('id', $id)->delete();
    }

    /**
     * delete all data model
     *
     * @param  \Illuminate\Http\Request  $request
     * */
    public function deletedraf()
    {
        $data = new DrafProduct();
        $data->truncate();
    }
}
