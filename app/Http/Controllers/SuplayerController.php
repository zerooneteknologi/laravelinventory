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
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function show(Suplayer $suplayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplayer $suplayer)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suplayer  $suplayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplayer $suplayer)
    {
        //
    }
}
