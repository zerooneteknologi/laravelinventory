<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DrafProduct;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cashier.pos.index', [
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
        return view('cashier.pos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->memberId == null) {
            $invoice = Invoice::insertGetId([
                'invoiceNo' => $request->invoiceNo,
                'date' => now()
            ]);
        } else {
            $invoice = Invoice::insertGetId([
                'memberId' => $request->memberId,
                'invoiceNo' => $request->invoiceNo,
                'date' => now()
            ]);
        }

        foreach ($request->productId as $key => $productId) {
            Sale::create([
                'invoiceId' => $invoice,
                'productId' => $productId,
                'qty' => $request->qty[$key],
                'subTotal' => $request->subTotal[$key]
            ]);
        }

        return redirect('/invoice/' . $invoice . '/edit');
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
            'sales' => Sale::where('invoiceId', $invoice->id)->get()
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
            'sales' => Sale::where('invoiceId', $invoice->id)->get(),
            'sum' => Sale::where('invoiceId', $invoice->id)->sum('subTotal'),
            'payments' => Payment::all()
        ]);

        // return $invoice;
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
        if ($invoice->memberId <> null) {
            if ($request->payment == 'cash') {
                Invoice::where('id', $invoice->id)->update([
                    'payment' => $request->payment,
                    'pay' => $request->pay,
                    'discount' => $request->discount,
                    'payTotal' => $request->payTotal,
                    'cash' => $request->cash,
                    'refund' => $request->refund
                ]);
            } elseif ($request->payment == 'tranfer') {
                return $request->recNo;
            } elseif ($request->payment == 'credit') {
                return $request->creditPay;
            }
        } else {
            if ($request->payment == 'cash') {
                Invoice::where('id', $invoice->id)->update([
                    'payment' => $request->payment,
                    'pay' => $request->pay,
                    'payTotal' => $request->pay,
                    'cash' => $request->cash,
                    'refund' => $request->refund
                ]);
            } elseif ($request->payment == 'tranfer') {
                return $request->recNo;
            } elseif ($request->payment == 'credit') {
                return $request->creditPay;
            }
        }


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

    /**
     * get member json
     * @param \App\Models\Customer
     * * @return \Illuminate\Http\Response
     */
    public function getMember(Customer $customer)
    {
        return response()->json([
            'member' => $customer
        ]);
    }

    /**
     * get member json
     * @param \App\Models\Product
     * * @return \Illuminate\Http\Response
     */
    public function getProduct(Product $product)
    {
        return response()->json([
            'product' => $product
        ]);
    }
}
