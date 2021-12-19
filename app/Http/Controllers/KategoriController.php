<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $data['data'] = Kategori::all();
        return view('kategori',$data);
    }

    public function tambah(Request $request){
        Kategori::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);
        return redirect('/kategori')->with('sukses','Berhasil menambah kategori');
    }

    public function edit(Request $request){
        $data = Kategori::find($request->id);
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->save();
        return redirect('/kategori')->with('sukses','Berhasil mengedit kategori');
    }

    public function hapus(Request $request){
        Kategori::destroy($request->id);
        return redirect('/kategori')->with('sukses','Berhasil meghapus kategori');
    }
}
