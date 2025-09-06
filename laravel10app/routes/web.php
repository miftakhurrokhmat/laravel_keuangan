<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// menambahkan 2 routing untuk fip dan fmipa
// setiap halaman menyebutkan nama lengkap fakultas

// fip
Route::get('/fip', function () {
    return view('fip');
});

// fmipa
Route::get('/fmipa', function () {
    return view('fmipa');
});

Route::get('/fakultas/', function () {
    return redirect('/');
});

Route::get('/fakultas/{nama_fakultas}', [FakultasController::class, 'index']);
//Route::get('/fakultas/{nama_fakultas}', 'FakultasController@index');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // form login
Route::post('/login', [AuthController::class, 'login']); // proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // proses logout


Route::middleware('auth')->group(function () {
    Route::get('/', [FinanceController::class, 'index'])->name('dashboard');
    Route::prefix('general')->group(function () {
        Route::get('/incomes', [FinanceController::class, 'incomes'])->name('finance.incomes');
        Route::get('/expenses', [FinanceController::class, 'expenses'])->name('finance.expenses');
        Route::get('/report', [FinanceController::class, 'report'])->name('finance.report');
    });

    Route::resource('incomes', IncomeController::class);

    // CRUD User
    Route::resource('users', UserController::class)->middleware('role:admin');

    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/datatable', [TransaksiController::class, 'transaksiDatatable'])->name('transaksi.datatable');
});
