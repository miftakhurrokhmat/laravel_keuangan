<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\IncomeCategory;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $incomes = Income::with('category')->orderBy('date', 'desc')->get();
        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = IncomeCategory::all();
        return view('incomes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'income_category_id' => 'required|exists:income_categories,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        Income::create($request->all());

        return redirect()->route('incomes.index')->with('success', 'Pemasukan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
        $categories = IncomeCategory::all();
        return view('incomes.edit', compact('income','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
        $request->validate([
            'income_category_id' => 'required|exists:income_categories,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        $income->update($request->all());

        return redirect()->route('incomes.index')->with('success', 'Pemasukan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Pemasukan berhasil dihapus.');
    }
}
