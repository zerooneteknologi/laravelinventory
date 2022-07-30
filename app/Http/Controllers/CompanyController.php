<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * autorization role
     */
    public function __construct()
    {
        $this->middleware('isOwner');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('setting.company.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validateData = $request->validate([
            'companyName' => 'required|max:255',
            'companyAddress' => 'required|max:255',
            'companyEmail' => 'required|max:255|email',
            'companyWebsite' => 'required|max:255',
            'companyPhone' => 'required|max:255',
            'companyPhoto' => 'required|image|file|max:2048',
        ]);

        Storage::delete($request->oldPhoto);

        $validateData['companyPhoto'] = $request->file('companyPhoto')->store('img/company/logo');

        Company::where('id', $company->id)->update($validateData);

        return redirect('/setting')->with('success', 'Profil perusahaan berhasil diubah!');
    }
}
