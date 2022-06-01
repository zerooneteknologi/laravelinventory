<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * autorization role
     */
    public function __construct()
    {
        $this->middleware('isOwner');
    }

    public function index()
    {
        // if (!auth()->check() || auth()->user()->role !== 'owner' || auth()->user()->role !== '') {
        //     abort(403);
        // }

        return view('setting.company.company', [
            'companies' => Company::all()
        ]);
    }
}
