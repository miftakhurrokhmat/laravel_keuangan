<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index');
    }

    public function transaksiDatatable(Request $request)
    {
        // bikin query union untuk pemasukan & pengeluaran
        $incomes = Income::select([
            'id as transaksi_id',
            'income_category_id as category_id',
            'amount',
            'date',
            'description',
            DB::raw("'pemasukan' as jenis")
        ]);

        $expenses = Expense::select([
            'id as transaksi_id',
            'expense_category_id as category_id',
            'amount',
            'date',
            'description',
            DB::raw("'pengeluaran' as jenis")
        ]);

        $transactions = $incomes->unionAll($expenses);

        // bungkus union pakai fromSub biar alias aman
        $query = DB::query()
            ->fromSub($transactions, 't')
            ->leftJoin('income_categories', function ($join) {
                $join->on('t.category_id', '=', 'income_categories.id')
                    ->where('t.jenis', 'pemasukan');
            })
            ->leftJoin('expense_categories', function ($join) {
                $join->on('t.category_id', '=', 'expense_categories.id')
                    ->where('t.jenis', 'pengeluaran');
            })
            ->select(
                't.transaksi_id',
                DB::raw("COALESCE(income_categories.name, expense_categories.name) as kategori"),
                't.amount',
                't.date',
                't.description',
                't.jenis'
            );

        // filter tanggal kalau ada
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('t.date', [$request->start_date, $request->end_date]);
        }

        // response DataTables
        return DataTables::of($query)
            ->filterColumn('kategori', function ($query, $keyword) {
                $query->whereRaw("LOWER(COALESCE(income_categories.name, expense_categories.name)) LIKE ?", ["%{$keyword}%"]);
            })
            // ->editColumn('amount', function ($row) {
            //     return number_format($row->amount, 2, ',', '.');
            // })
            ->editColumn('date', function ($row) {
                return \Carbon\Carbon::parse($row->date)->translatedFormat('d F Y');
            })
            ->make(true);
    }
}
