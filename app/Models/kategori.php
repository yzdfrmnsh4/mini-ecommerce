<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class kategori extends Model
{
    protected $table = "kategori";
    protected $guarded = ["id"];

    public function produk(): BelongsToMany
    {
        return $this->belongsToMany(produk::class, 'relasi_produk_kategori', 'id_kategori', 'id_produk');
    }
}
