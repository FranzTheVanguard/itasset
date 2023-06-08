<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    
            
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'ip_address',
        'nama_cabang',
        'nama_komputer',
        'serial_number',
        'dipinjam',
        'item_id',
        'user_id',
    ];
}
