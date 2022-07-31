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
        return view('home', [
            'category' => Category::count(),
            'product' => Product::count(),
            'member' => Customer::count(),
            'invoice' => Invoice::count(),
            'suplayer' => Suplayer::count(),
            'income' => Invoice::sum('payTotal'),
            'outcome' => Purchase::sum('payTotal'),
            'credit' => Credit::sum('debt'),
            'products' => Product::all()
        ]);
    }
}
