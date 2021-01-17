<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;
use Auth;
class Transaksi extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = \App\Databarang::select('nama','id')->get();
        return view('admin.peminjaman', ['data' => $data]);
    }

    public function tablepeminjaman()
    {
        $data = DB::table('peminjamans')
                ->join('users', 'users.id', '=', 'peminjamans.created_by')
                ->join('databarangs', 'databarangs.id', '=', 'peminjamans.barang_id')
                ->select('peminjamans.*', 'users.name as namaadmin', 'databarangs.nama', 'databarangs.kode as kode_barang')
                ->whereNull('peminjamans.tanggal_kembali')
                ->get();
                // return json_encode($data);
        return Datatables::of($data)
        ->addColumn('action', function ($data) {
            // $url = Route('data-barang.update', ['id' => $data->id ]) ;
            $session = "@csrf";
        return "<button data-toggle='modal' data-target='#confirm-balik' class='btn btn-success btn-xs'
                        title='Kembalikan Barang' data-id='".$data->id."' id='balik-item'>
                        <i class='fa fa-mail-reply'></i>
                      </button>

                <button class='btn btn-danger btn-xs' title='Hapus Data' id='del_id' 
                href='peminjaman/".$data->id."'>
                    <i class='fa fa-trash'></i>
                </button>";
        })
        ->editColumn('foto_awal', function ($data) {
          return '<img src="storage/'.$data->foto_awal.'"  width="90px">' ;
        })
        ->rawColumns(['foto_awal','action'])
        ->make(true);
    }

    public function create()
    {
        //
    }

    public function hapuspernahpinjam($id)
    {
        $data = \App\Peminjaman::findOrfail($id);
        $data->delete();
         return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Menghapus Data' );

    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'foto' => 'mimes:jpeg,png,jpg|max:3072'
        ]);

        $id = $request->kode_barang;
        $cek = \App\Databarang::where('id', '=', $id)->pluck('stok')->first();
        // $hasil = json_encode($cek);
        // return $cek;
        if($request->jumlah > $cek) {
            return $arrayName = array('status' => 'error' , 'pesan' => 'Stok Tidak Cukup' );
        }

        $update_barang = \App\Databarang::findOrfail($id);
        $update_barang->stok = $update_barang->stok - $request->jumlah;
        $update_barang->save();

        $data = new \App\Peminjaman;
        // return $arrayName = array('status' => 'success' , 'pesan' => 'here' );
        $dokumentasi = $request->file('foto'); // foto barang saat dikembalikan
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('dokumentasi', 'public');
            $data->foto_awal = $dokumentasi_path;
        }
        // return $arrayName = array('status' => 'success' , 'pesan' => 'here' );
        $data->barang_id      = $request->kode_barang;
        $data->peminjam       = $request->peminjam;
        $data->kondisi        = 'Layak Pakai';
        $data->jumlah         = $request->jumlah;
        $data->created_by     = \Auth::user()->id;
        $data->save();
        return $arrayName = array('status' => 'success' , 'pesan' => 'Transaksi Berhasil' );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = DB::table('peminjamans')
                ->join('databarangs', 'databarangs.id', '=', 'peminjamans.barang_id')
                ->select('peminjamans.kondisi', 'peminjamans.peminjam', 'peminjamans.id', 'databarangs.nama')
                ->where('peminjamans.id', '=', $id)
                ->first();

        // $data = \App\Peminjaman::findOrfail($id);
                // return $data;
        return response()->json(['data' => $data]);
    }

    public function get_pernah_pinjam()
    {
        return view('admin.databarangpinjam');
    }
    public function pernahpinjam()
    {
        // $data = new \App\Peminjaman::whereNotNull('tanggal_kembali')->get();
        $data = DB::table('peminjamans')
                ->join('users', 'users.id', '=', 'peminjamans.created_by')
                // ->join('users', 'users.id', '=', 'peminjamans.accepted_by')
                ->join('databarangs', 'databarangs.id', '=', 'peminjamans.barang_id')
                ->select('peminjamans.*', 'users.name as namaadmin', 'databarangs.nama', 'databarangs.kode as kode_barang')
                ->whereNotNull('peminjamans.tanggal_kembali')
                ->get();
        // return $data;
        // return view('admin.databarangpinjam', ['data'=>$data]);

        return Datatables::of($data)
        ->addColumn('action', function ($data) {
            $role = \Auth::user()->roles;
            $cek  = 'hapus_cek("'.$role.'")';
        return "<button class='btn btn-danger btn-xs' title='Hapus Data' id='del_pernah_pinjam' 
                href='pernahpinjam/".$data->id."' onclick='".$cek."'>
                    <i class='fa fa-trash'></i>
                </button>";
        })
        ->editColumn('foto_kembali', function ($data) {
          return '<img src="storage/'.$data->foto_kembali.'"  width="90px">' ;
        })
        ->rawColumns(['foto_kembali', 'action'])
        ->make(true);
    }

    public function update(Request $request, $id) // kembalikan barang
    {
        $validasi = $this->validate($request, [
            'foto' => 'mimes:jpeg,png,jpg|max:3072'
        ]);

        $data_peminjaman = \App\Peminjaman::findOrfail($id);
                $id_barang   = $data_peminjaman->barang_id;
                $stok_pinjam = $data_peminjaman->jumlah;

        $update_barang = \App\Databarang::findOrfail($id_barang);
        $update_barang->stok = $update_barang->stok +  $stok_pinjam;
        $update_barang->kondisi = $request->kondisi;
        $update_barang->save();

        $dokumentasi = $request->file('foto'); // foto barang saat dikembalikan
        if($dokumentasi) {
            $dokumentasi_path = $dokumentasi->store('dokumentasi', 'public');
            $data_peminjaman->foto_kembali = $dokumentasi_path;
        }

        $data_peminjaman->tanggal_kembali     = Carbon::now();
        $data_peminjaman->accepted_by       = \Auth::user()->name;
        $data_peminjaman->save();

        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Mengubah Data' );
    }

    public function destroy($id)
    {
        $data = \App\Peminjaman::findOrfail($id);
        $id_barang  = $data->barang_id;
        $stok_pinjam= $data->jumlah;

        $update_barang = \App\Databarang::findOrfail($id_barang);
        $update_barang->stok = $update_barang->stok +  $stok_pinjam;
        $update_barang->save();

        $data->delete();
        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Menghapus Data' );
    }
}
