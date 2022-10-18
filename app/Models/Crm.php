<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_customer',
        'email_customer',
        'no_hp_customer'
    ];
    public function penjualans(){
        return $this->hasMany(Penjualan::class);
    }
}
