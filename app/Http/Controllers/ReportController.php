<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Credit;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of income.
     * 
     * @return \Illuminate\Http\Response
     */
    public function income()
    {
        return view('report.income.index');
    }

    /**
     * filtering a listing of income.
     * 
     * @return \Illuminate\Http\Response
     */
    protected function data($start, $end)
    {
        $totalIncome = 0;
        while (strtotime($start) <= strtotime($end)) {
            $purchase = Purchase::where('date', 'LIKE', "%$start%")->sum('payTotal');
            $invoice = Invoice::where('date', 'LIKE', "%$start%")->sum('payTotal');
            $credit = Credit::where('date', 'LIKE', "%$start%")->sum('credit');
            $pay = Credit::where('date', 'LIKE', "%$start%")->sum('pay');
            $date = $start;
            $income = $invoice - $credit - $purchase + $pay;
            $data['date'] = $date;
            $data['purchase'] = $purchase;
            $data['invoice'] = $invoice;
            $data['credit'] = $credit;
            $data['pay'] = $pay;
            $data['income'] = $income;
            $totalIncome += $income;
            $outflow[] = $data;
            $start = date('Y-m-d', strtotime("+1 days", strtotime($start)));
        }

        return view('report.income.table', [
            'datas' => $outflow,
            'total' => $totalIncome
        ]);
    }

    public function filter($start, $end)
    {
        return $this->data($start, $end);
    }

    public function print(Request $request)
    {
        return view('report.income.report', [
            'companies' => Company::all(),
            'start' => $request->start,
            'end' => $request->end
        ]);
    }

    /**
     * Display a listing report of product.
     * @param App\Models\Product;
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        return view('report.product.index');
    }

    public function dataProduct()
    {
        $product = Product::all();

        return $product;
    }
}
