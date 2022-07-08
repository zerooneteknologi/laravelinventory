<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Suplayer;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // aoutrization
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
        return view('warehouse.product.product', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isWarehous');

        return view('warehouse.product.create', [
            'suplayers' => Suplayer::all(),
            'categories' => Category::all()
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
        $this->authorize('isWarehous');

        $validateData = $request->validate([
            'productCode' => 'required|max:255',
            'productName' => 'required|max:255',
            'categoryId' => 'required|max:255',
            'suplayerId' => 'required|max:255',
            'brand' => 'required|max:255',
            'stock' => 'required|max:255',
            'purchasePrice' => 'required|max:255',
            'sellingPrice' => 'required|max:255',
        ]);

        // return dd($validateData);

        Product::create($validateData);

        return redirect('/product')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('warehouse.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('isWarehous');

        return view('warehouse.product.edit', [
            'products' => $product,
            'categories' => Category::all(),
            'suplayers' => Suplayer::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize('isWarehous');

        $validateData = $request->validate([
            'productCode' => 'required|max:255',
            'productName' => 'required|max:255',
            'categoryId' => 'required|max:255',
            'suplayerId' => 'required|max:255',
            'brand' => 'required|max:255',
            'stock' => 'required|max:255',
            'purchasePrice' => 'required|max:255',
            'sellingPrice' => 'required|max:255',
        ]);

        Product::where('id', $product->id)->update($validateData);

        return redirect('/product')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('isWarehous');

        $product->delete();

        return back()->with('success', 'Produk berhasil di hapus!');
    }
}
