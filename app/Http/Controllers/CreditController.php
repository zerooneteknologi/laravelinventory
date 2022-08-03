<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    // autorization
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
        return view('cashier.credit.index', [
            'credits' => Credit::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit $credit)
    {
        return view('cashier.credit.edit', [
            'credit' => $credit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $credit)
    {
        Credit::where('id', $credit->id)->update([
            'pay' => $request->pay,
            'debt' => $request->cash
        ]);

        return redirect('/customer/' . $credit->customer->id)->with('success', 'kredit berhasil dibayar');
    }
}
