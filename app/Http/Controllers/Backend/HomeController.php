<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Account;
use App\Models\Backend\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $totalIncome = Account::sum('income');
        $totalUser = User::count();
        $totalAgent = User::where('level', 'agent')->count();

        $thisWeekIncome = Account::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->sum('income');

        $lastWeekIncome = Account::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->sum('income');

        $incomeGrowth = 0;
        if ($lastWeekIncome > 0) {
            $incomeGrowth = (($thisWeekIncome - $lastWeekIncome) / $lastWeekIncome) * 100;
        } elseif ($lastWeekIncome == 0 && $thisWeekIncome > 0) {
            $incomeGrowth = 100;
        } elseif ($lastWeekIncome > 0 && $thisWeekIncome == 0) {
            $incomeGrowth = -100;
        }

        $thisWeekUsers = User::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $lastWeekUsers = User::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

        $userGrowth = 0;
        if ($lastWeekUsers > 0) {
            $userGrowth = (($thisWeekUsers - $lastWeekUsers) / $lastWeekUsers) * 100;
        } elseif ($lastWeekUsers == 0 && $thisWeekUsers > 0) {
            $userGrowth = 100;
        } elseif ($lastWeekUsers > 0 && $thisWeekUsers == 0) {
            $userGrowth = -100;
        }
        $thisWeekAgents = User::where('level', 'agent')
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();

        $lastWeekAgents = User::where('level', 'agent')
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek()
            ])->count();

        $agentGrowth = 0;
        if ($lastWeekAgents > 0) {
            $agentGrowth = (($thisWeekAgents - $lastWeekAgents) / $lastWeekAgents) * 100;
        } elseif ($lastWeekAgents == 0 && $thisWeekAgents > 0) {
            $agentGrowth = 100;
        } elseif ($lastWeekAgents > 0 && $thisWeekAgents == 0) {
            $agentGrowth = -100;
        }

        return view('backend.home', compact('totalIncome', 'totalUser', 'totalAgent', 'incomeGrowth', 'thisWeekIncome', 'userGrowth','agentGrowth'));
    }
}
