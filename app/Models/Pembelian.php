<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
          /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
  
        'nama_vendor',
        'alamat_vendor',
        'jenis',
        'tanggal_pembelian',
       
    ];

    
}
