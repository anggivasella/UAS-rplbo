<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{
    public function riwayat(){
        $pengguna = Session::get('pengguna');
        $data['data'] = Transaksi::where('pengguna_id',$pengguna->id)->get()->reverse();
        return view('riwayat',$data);
    }

    public function profil(){
        $data['data'] = Session::get('pengguna');
        return view('profil',$data);
    }

    public function edit(Request $request){
        $pengguna = Session::get('pengguna');
        $data = Pengguna::find($pengguna->id);
        $data->nohp = $request->nohp;
        if ($request->password){
            $data->password = md5($request->password);
        }
        $data->save();
        Session::put('pengguna',$data);
        return redirect('/profil')->with('sukses','Sukses mengubah profil');
    }
}
