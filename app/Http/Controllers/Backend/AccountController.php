<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Account;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $query = Account::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")
                    ->orWhere('date', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_filter')) {
            $query->where('category', $request->category_filter);
        }

        if ($request->filled('price_sort')) {
            $direction = $request->price_sort == 'high' ? 'desc' : 'asc';
            $query->orderByRaw("GREATEST(income, expense) $direction");
        } else {
            $query->latest();
        }

        $accounts = $query->paginate(10)->appends($request->all());

        $totalIncome = Account::sum('income');
        $totalExpense = Account::sum('expense');
        $totalBalance = $totalIncome - $totalExpense;

        $lastWeekIncome = Account::whereBetween('created_at', [now()->subDays(14), now()->subDays(7)])->sum('income');
        $thisWeekIncome = Account::whereBetween('created_at', [now()->subDays(7), now()])->sum('income');
        $incomeGrowth = $lastWeekIncome > 0 ? (($thisWeekIncome - $lastWeekIncome) / $lastWeekIncome) * 100 : 100;

        $accounts->getCollection()->transform(function ($item) {
            $item->thai_date = Carbon::parse($item->date)->addYears(543)->locale('th')->translatedFormat('j M Y');
            return $item;
        });

        return view('backend.account', compact(
            'accounts',
            'totalIncome',
            'totalExpense',
            'totalBalance',
            'incomeGrowth'
        ));
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'category' => 'required|in:รายรับ,รายจ่าย',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $account = new Account();
        $account->date = now()->format('Y-m-d');
        $account->description = $request->description;
        $account->category = $request->category;

        if ($request->category == 'รายรับ') {
            $account->income = $request->amount;
            $account->expense = 0;
        } else {
            $account->expense = $request->amount;
            $account->income = 0;
        }

        $account->save();

        return back()->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
    }
    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);

        $account->description = $request->description;
        $account->category = $request->category;

        if ($request->category == 'รายรับ') {
            $account->income = $request->amount;
            $account->expense = 0;
        } else {
            $account->expense = $request->amount;
            $account->income = 0;
        }

        $account->save();
        return back()->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return back()->with('success', 'ลบรายการเรียบร้อยแล้ว');
    }
}
