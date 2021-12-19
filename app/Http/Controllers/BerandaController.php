<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
        $data['jumlah'] = collect($transaksi)->count();
        $data['selesai'] = collect($transaksi)->where('status',2);
        $data['belum'] = collect($transaksi)->where('status',0);
        $data['siap'] = collect($transaksi)->where('status',1);
        $data['batal'] = collect($transaksi)->where('status',3);
        $data['total'] = collect($transaksi)->where('status',2)->sum('total_harga');
        return view('beranda',$data);
    }
}
