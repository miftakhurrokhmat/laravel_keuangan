<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosenFmipa;
use App\Models\DosenFip;

class FakultasController extends Controller
{
    // 1. membaca parameter -> fip / fmipa
    // 2. jika fip maka akan menggunakan view fip.blade.php
    // 3. jika fmipa maka akan menggunakan view fmipa.blade.php

    public function index($nama_fakultas)
    {
        if ($nama_fakultas == 'fip') {
            $datas = DosenFip::get();
            // dd($data);
            return view('fip', compact('datas'));       
        } elseif ($nama_fakultas == 'fmipa') {
            $datas = DosenFmipa::get();
            // dd($data);
            return view('fmipa', compact('datas'));
        } else {
            // return "Fakultas tidak ditemukan";
            return redirect('/');
        }
    }
}
