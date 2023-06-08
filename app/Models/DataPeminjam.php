<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeminjam extends Model
{
    use HasFactory;
          /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
  
        'user',
        'divisi',
        'alamat',
        'nomor_telepon',
        
       
    ];
}
