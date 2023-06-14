<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{   
    protected $table = 'laporans';
    use HasFactory;
          /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'item_type'
    ];

    public function item(){
        if($this->item_type == 'Peminjaman') return $this->belongsTo(Peminjaman::class,'item_id');
        else return $this->belongsTo(Pengembalian::class,'item_id');
    }

    
}
