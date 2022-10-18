<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_customer',
        'nama_produk',
        'ukuran',
        'harga_produk',
        'jenis_produk'
    ];

    public function crms(){
        return $this->belongsTo(Crm::class, 'nama_customer');
    }
}
