<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class headTransaksi extends Model
{
    protected $table = 'head_transaksi';
    protected $guarded = ['id'];

    /**
     * Get all of the detail_transaksi for the headTransaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail_transaksi(): HasMany
    {
        return $this->hasMany(detailTransaksi::class, 'id_transaksi', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
