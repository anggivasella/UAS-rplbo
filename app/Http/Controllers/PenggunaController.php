<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    public function masuk(){
        $data = Session::get('pengguna');
        if ($data){
            if ($data->tipe == 'admin'){
                return redirect('/beranda');
            }else{
                return redirect('/riwayat');
            }
        }

        return view('masuk');
    }

    public function login(Request $request){
        $data = Pengguna::where('username',$request->username)->where('password',md5($request->password))->get();
        if (count($data) == 0){
            return redirect('/')->with('gagal','Gagal masuk');
        }
        Session::put('pengguna',$data->first());
        if ($data->first()->tipe == 'admin'){
            return redirect('/beranda');
        }else{
            return redirect('/riwayat');
        }
    }

    public function daftar(Request $request){
        $data = Pengguna::where('username',$request->username)->get();
        if (count($data) > 0){
            return redirect('/')->with('gagal','Username sudah ada');
        }
        if ($request->password != $request->konfirmasipassword){
            return redirect('/')->with('gagal','Konfirmasi password salah');
        }
        $pengguna = Pengguna::create([
            'username' => $request->username,
            'password' => md5($request->password),
            'tipe' => 'pelanggan',
            'nohp' => $request->nohp
        ]);
        Session::put('pengguna',$pengguna);
        return redirect('/riwayat')->with('sukses','Berhasil mendaftar');
    }

    public function password(Request $request){
        $data = Pengguna::find(1);
        if (md5($request->passwordlama) != $data->password){
            return redirect()->back()->with('gagal','Password Lama Salah');
        }
        if ($request->password != $request->passwordkonfirmasi){
            return redirect()->back()->with('gagal','Konfirmasi Password Salah');
        }
        $data->password = md5($request->password);
        $data->save();
        return redirect()->back()->with('sukses','Berhasil mengganti password');
    }

    public function keluar(){
        Session::flush();
        return redirect('/');
    }
}
