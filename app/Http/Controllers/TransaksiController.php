<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
        $data['belum'] = collect($transaksi)->where('status',0)->reverse();
        $data['siap'] = collect($transaksi)->where('status',1)->reverse();
        $data['selesai'] = collect($transaksi)->where('status',2)->reverse();
        $data['batal'] = collect($transaksi)->where('status',3)->reverse();
        $data['pelanggan'] = Pengguna::where('tipe','pelanggan')->get();
        $data['kategori'] = Kategori::all();
        return view('transaksi',$data);
    }

    public function buat(Request $request){
        $kategori = Kategori::find($request->kategori_id);
        $berat = (float)$request->total_berat;
        $harga = $kategori->harga;
        Transaksi::create([
            'pengguna_id' => $request->id,
            'kategori_id' => $request->kategori_id,
            'jumlah_pakaian' => $request->jumlah_pakaian,
            'total_berat' => $request->total_berat,
            'harga' => $harga,
            'total_harga' => (int)$harga*$berat,
            'status' => 0
        ]);

        return redirect('/transaksi')->with('sukses','Sukses membuat transaksi');
    }

    public function siap(Request $request){
        $data = Transaksi::find($request->id);
        $data->status = 1;
        $data->waktu_siap = Carbon::now();
        $data->save();
        return redirect('/transaksi')->with('sukses','Transaksi telah siap');
    }

    public function selesai(Request $request){
        $data = Transaksi::find($request->id);
        $data->status = 2;
        $data->waktu_selesai = Carbon::now();
        $data->save();
        return redirect('/transaksi')->with('sukses','Transaksi diselesaikan');
    }

    public function batal(Request $request){
        $data = Transaksi::find($request->id);
        $data->status = 3;
        $data->save();
        return redirect('/transaksi')->with('sukses','Transaksi dibatalkan');
    }
}
