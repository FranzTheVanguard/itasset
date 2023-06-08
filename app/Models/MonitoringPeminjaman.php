<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringPeminjaman extends Model
{
    use HasFactory;
          /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
  
        'nama_barang',
        'user',
        'divisi',
        
       
    ];
}
