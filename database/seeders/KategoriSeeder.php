<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                    [
                        'kategori' => 'Baju',
                        'deskripsi' => 'Berbagai jenis baju seperti kaos, blouse, dan atasan casual untuk pria dan wanita.',
                    ],
                    [
                        'kategori' => 'Kemeja',
                        'deskripsi' => 'Koleksi kemeja formal dan casual dengan berbagai model dan ukuran.',
                    ],
                    [
                        'kategori' => 'Celana',
                        'deskripsi' => 'Celana panjang dan pendek seperti jeans, chino, dan bahan formal.',
                    ],
                    [
                        'kategori' => 'Jaket',
                        'deskripsi' => 'Jaket hoodie, bomber, dan outerwear untuk berbagai gaya fashion.',
                    ],
                    [
                        'kategori' => 'Dress',
                        'deskripsi' => 'Aneka dress modern dan elegan untuk acara formal maupun santai.',
                    ],
                ];

        foreach ($data as $kategori) {
            kategori::create($kategori);
        }
    }
}
