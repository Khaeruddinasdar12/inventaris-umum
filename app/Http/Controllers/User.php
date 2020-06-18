<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.user');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function tableuser()
    {
        $data = \App\User::get();
        return Datatables::of($data)
        ->addColumn('action', function ($data) {
            $role = \Auth::user()->roles;
            $edit_cek  = 'cek_edit("'.$role.'")';
            $hapus_cek = 'hapus_cek("'.$role.'")';
        return "<button class='btn btn-success btn-xs' title='Edit Data' id='edit-item' 
                data-id='".$data->id."' onclick='".$edit_cek."' >
                    <i class='fa fa-pencil'></i>
                </button>

                <button class='btn btn-danger btn-xs' title='Hapus Data' id='del_user'
                href='user/".$data->id."' onclick='".$hapus_cek."'>
                    <i class='fa fa-trash'></i>
                </button>";
        })
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'noreg'     => 'required|unique:users|min:14|max:14',
            'phone'     => 'required|unique:users|min:12|max:14',
            'password'  => 'required|string|min:6',
            'email'     => 'required|unique:users|max:255',
        ]);

        $datauser = new \App\User;
        $datauser->name      = $request->name;
        $datauser->email     = $request->email;
        $datauser->roles     = $request->role;
        $datauser->phone     = $request->phone;
        $datauser->noreg     = $request->noreg;
        $datauser->password  = Hash::make($request['password']);
        $datauser->save();
        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Menambah Data User' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\User::findOrfail($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validasi = $this->validate($request, [
        //     'noreg'     => 'required|unique:users|min:14|max:14',
        //     'phone'     => 'required|unique:users|min:12|max:14',
        //     'password'  => 'required|string|min:6',
        //     'email'     => 'required|unique:users|max:255',
        // ]);

        $datauser = \App\User::findOrfail($id);
        // $datauser->name      = $request->name;
        // $datauser->email     = $request->email;
        $datauser->roles     = $request->roles;
        // $datauser->phone     = $request->phone;
        // $datauser->noreg     = $request->noreg;
        $datauser->save();
        return $arrayName = array('status' => 'success' , 'pesan' => 'Berhasil Mengubah Data User', 'role' => $datauser->roles );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user()->id == $id){
            return $arrayName = array('status' => 'error' , 
                                      'pesan' => 'Akun ini sedang digunakan' );
        }
        $data = \App\User::findOrfail($id);
        $data->delete();
            return $arrayName = array('status' => 'success' , 
                                      'pesan' => 'Berhasil Menghapus Data User' );
    }
}
