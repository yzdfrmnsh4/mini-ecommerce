<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('relasi_produk_kategori', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_produk");
            $table->unsignedBigInteger("id_kategori");
            $table->foreign("id_produk")->references("id")->on("produk")->onDelete("cascade");
            $table->foreign("id_kategori")->references("id")->on("kategori")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relasi_produk_kategori');
    }
};
