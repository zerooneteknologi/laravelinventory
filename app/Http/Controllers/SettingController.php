<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
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
        return view('setting.setting', [
            'companies' => Company::all(),
            'users' => User::all()
        ]);
    }
}
