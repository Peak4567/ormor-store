<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Account;
use App\Models\Backend\User;
use App\Models\Backend\Booking;
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

        $incomeGrowth = $this->calculateGrowth($lastWeekIncome, $thisWeekIncome);

        $thisWeekUsers = User::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $lastWeekUsers = User::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

        $userGrowth = $this->calculateGrowth($lastWeekUsers, $thisWeekUsers);

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

        $agentGrowth = $this->calculateGrowth($lastWeekAgents, $thisWeekAgents);

        $monthlyRevenues = Account::selectRaw('MONTH(created_at) as month, SUM(income) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyRevenues[$i] ?? 0;
        }

        $latestBookings = Booking::latest()->take(6)->get();

        return view('backend.home', compact(
            'totalIncome', 
            'totalUser', 
            'totalAgent', 
            'incomeGrowth', 
            'thisWeekIncome', 
            'userGrowth',
            'agentGrowth',
            'chartData',
            'latestBookings'
        ));
    }

    private function calculateGrowth($last, $current)
    {
        if ($last > 0) {
            return (($current - $last) / $last) * 100;
        } elseif ($last == 0 && $current > 0) {
            return 100;
        } elseif ($last > 0 && $current == 0) {
            return -100;
        }
        return 0;
    }
}