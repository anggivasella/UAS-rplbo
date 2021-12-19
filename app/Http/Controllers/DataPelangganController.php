<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DataPelangganController extends Controller
{
    public function index(){
        $data['data'] = Pengguna::whereNotIn('tipe',['admin'])->get();
        return view('datapelanggan',$data);
    }

    public function edit(Request $request){
        $data = Pengguna::find($request->id);
        $data->nohp = $request->nohp;
        if ($request->password){
            $data->password = md5($request->password);
        }
        $data->save();
        return redirect('/pelanggan')->with('sukses','Sukses mengubah data pelanggan');
    }

    public function riwayat($id){
        $data['data'] = Transaksi::where('pengguna_id',$id)->get();
        $data['pengguna'] = Pengguna::find($id);
        return view('riwayatpelanggan',$data);
    }
}
