<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $databarang     = \App\Databarang::count();
        $barangpinjam   = \App\Peminjaman::whereNull('tanggal_kembali')->count();
        // return $data;
        return view('admin.home',['databarang' => $databarang, 'barangpinjam' => $barangpinjam]);  
        // return view('admin.home');
    }
    public function superadmin()
    {
        return 'hhh';
    }

    public function tableuser()
    {
        return 'hhh';
    }

}
