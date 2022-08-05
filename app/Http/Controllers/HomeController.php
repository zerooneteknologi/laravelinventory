<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Credit;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Suplayer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date('Y-m-d');
        return view('home', [
            'category' => Category::count(),
            'product' => Product::count(),
            'member' => Customer::count(),
            'invoice' => Invoice::count(),
            'suplayer' => Suplayer::count(),
            'income' => Invoice::where('date', 'LIKE', "%$date%")->sum('payTotal'),
            'outcome' => Purchase::sum('payTotal'),
            'outcome' => Purchase::where('date', 'LIKE', "%$date%")->sum('payTotal'),
            'credit' => Credit::sum('debt'),
            'products' => Product::all()
        ]);
        // return $income;
    }
}
