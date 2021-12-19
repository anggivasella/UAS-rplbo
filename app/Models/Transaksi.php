<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $guarded = ['id'];

    public function pengguna(){
        return $this->belongsTo(Pengguna::class,'pengguna_id');
    }
}
