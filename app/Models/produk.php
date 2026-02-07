<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produk extends Model
{
    protected $table = "produk";
    protected $guarded = ["id"];

    /**
     * The kategori that belong to the produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategori(): BelongsToMany
    {
        return $this->belongsToMany(kategori::class, 'relasi_produk_kategori', 'id_produk', 'id_kategori');
    }


    /**
     * Get all of the detailTransaksi for the produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(detailTransaksi::class, 'id_produk', 'id');
    }
    public function detail_trans(): HasMany
    {
        return $this->hasMany(detailTransaksi::class, 'id_produk', 'id');
    }
}
