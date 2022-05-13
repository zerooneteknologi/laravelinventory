<?php

namespace App\Http\Controllers;

use App\Models\Suplayer;
use Illuminate\Http\Request;

class SuplayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Autorization
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('warehouse.suplayer.suplayer', [
            'suplayers' => Suplayer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse.suplayer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phoneNumber' => 'required|max:30',
            'website' => 'required'
        ]);

        Suplayer::create($validateData);

        return redirect('/suplayer')->with('success', 'Suplayer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function show(Suplayer $suplayer)
    {
        return view('warehouse.suplayer.show', [
            'suplayer' => $suplayer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplayer $suplayer)
    {
        return view('warehouse.suplayer.edit', [
            'suplayers' => $suplayer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suplayer $suplayer)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phoneNumber' => 'required|max:20',
            'website' => 'required'
        ]);

        Suplayer::where('id', $suplayer->id)->update($validateData);

        return redirect('suplayer')->with('success', 'suplayer berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplayer $suplayer)
    {
        $suplayer->delete();

        return back()->with('success', 'suplayer berhasil di hapus!');
    }
}
