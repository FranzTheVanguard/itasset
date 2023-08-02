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
        'nama_cabang',
        'nama_komputer',
        'qty',
        'ori_qty'
    ];

    public function peminjaman() {
        return $this->hasMany(Peminjaman::class, 'item_id');
    }

}
