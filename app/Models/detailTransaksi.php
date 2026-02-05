<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $guarded = ['id'];



    /**
     * Get the produk that owns the detailTransaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // 
}
