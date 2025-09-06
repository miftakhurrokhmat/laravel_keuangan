<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;

class FinanceController extends Controller
{

    public function index()
    {
        $totalIncome = Income::sum('amount');
        $totalExpense = Expense::sum('amount');
        $balance = $totalIncome - $totalExpense;

        $incomes = Income::with('category')->latest()->take(5)->get();
        $expenses = Expense::with('category')->latest()->take(5)->get();

        return view('finance.dashboard', compact('balance', 'incomes', 'expenses'));
    }

    public function incomes()
    {
        $incomes = Income::with('category')->get();
        return view('finance.income', compact('incomes'));
    }

    public function expenses()
    {
        $expenses = Expense::with('category')->get();
        return view('finance.expense', compact('expenses'));
    }

    public function report()
    {
        $totalIncome = Income::sum('amount');
        $totalExpense = Expense::sum('amount');
        $balance = $totalIncome - $totalExpense;

        // Ambil data per bulan (pemasukan & pengeluaran)
        $labels = [];
        $pemasukan = [];
        $pengeluaran = [];

        // loop 1-12 untuk bulan
        for ($month = 1; $month <= 12; $month++) {
            $labels[] = date("F", mktime(0, 0, 0, $month, 1)); // nama bulan (Januari, dst.)

            $pemasukan[] = Income::whereMonth('date', $month)->sum('amount');
            $pengeluaran[] = Expense::whereMonth('date', $month)->sum('amount');
        }

        // return view('finance.report', compact('totalIncome', 'totalExpense', 'balance'));
        return view('finance.report', compact(
            'totalIncome',
            'totalExpense',
            'balance',
            'labels',
            'pemasukan',
            'pengeluaran'
        ));
    }
}
