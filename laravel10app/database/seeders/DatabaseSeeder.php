<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use App\Models\Income;
use App\Models\Expense;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Kategori Pemasukan
        $incomeCategories = ['Gaji', 'Bonus', 'Investasi'];
        foreach ($incomeCategories as $cat) {
            IncomeCategory::create(['name' => $cat]);
        }

        // Kategori Pengeluaran
        $expenseCategories = ['Makanan', 'Transportasi', 'Hiburan'];
        foreach ($expenseCategories as $cat) {
            ExpenseCategory::create(['name' => $cat]);
        }

        // Dummy Transaksi Pemasukan
        Income::create([
            'income_category_id' => 1,
            'amount' => 5000000,
            'date' => now(),
            'description' => 'Gaji bulan ini',
        ]);

        // Dummy Transaksi Pengeluaran
        Expense::create([
            'expense_category_id' => 1,
            'amount' => 200000,
            'date' => now(),
            'description' => 'Makan siang',
        ]);
    }
}
