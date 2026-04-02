<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Account;
use App\Models\Backend\User;

class HomeController extends Controller
{
    public function index()
    {
        $totalIncome = Account::sum('income');
        $totalUser = User::count();
        $totalAgent = User::where('level', 'agent')->count();
        return view('backend.home', compact('totalIncome','totalUser','totalAgent'));
    }
}
