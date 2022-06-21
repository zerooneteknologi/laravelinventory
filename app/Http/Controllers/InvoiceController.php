<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /*
    * autorizer
    **/
    public function __construct()
    {
        $this->middleware('isCashier');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cashier.pos.invoice', [
            'invoices' => Invoice::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cashier.pos.create', [
            'products' => Product::all(),
            'customers' => Customer::all(),
            'payments' => Payment::all()
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
        $customerId = '';
        if (!empty($request->customerId)) {
            $customerId = $request->customerId;
        }

        $invoice = Invoice::insertGetId([
            'customerId' => (int)$customerId,
            'invoiceNo' => $request->invoiceNo,
            'add_at' => now(),
        ]);

        foreach ($request->productId as $key => $productId) {
            $data = new Order();
            $data->productId = $productId;
            $data->invoiceId = $invoice;
            $data->qty = $request->qty[$key];
            $data->total = (int) str_replace(",", "", $request->subTotal[$key]);
            $data->save();
        }

        return redirect("/invoice/$invoice/edit");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('cashier.pos.show', [
            'invoice' => $invoice,
            'orders' => Order::where('invoiceId', 1)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('cashier.pos.edit', [
            'invoice' => $invoice,
            'orders' => Order::where('invoiceId', 1)->get(),
            'payTotal' => Order::where('invoiceId', 1)->sum("total"),
            'payments' => Payment::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $data = Invoice::where('id', $invoice->id)->update([
            'payTotal' => (int) str_replace(",", "", $request->payTotal),
            'cash' => (int) str_replace(",", "", $request->cash),
            'refund' => (int) str_replace(",", "", $request->refund)
        ]);

        return redirect('/invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
