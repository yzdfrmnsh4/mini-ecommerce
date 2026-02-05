<?php

namespace App;

use App\Models\detailTransaksi;
use App\Models\headTransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class transaksi
{
    public $headtrans;
    /**
     * Create a new class instance.
     */
    public function __construct(
        public int $qty,
        public string $ukuran,
        public string $harga_produk,
        public string $id_produk,

    ) {
        //
    }


    // public static function request($request)
    // {
    //     return new self(
    //         $request->qty,
    //     );


    // }

    public function saveHeadTrans()
    {
        $this->headtrans = headTransaksi::create([
            'kode_transaksi' => time() . Str::random(5),
            'total_barang' => 0,
            'total_harga' => 0,
            'id_user' => Auth::user()->id,
            'status' => 1,
            'bukti' => 0,
        ]);


        return $this;
    }
    public static function saveHeadTranss()
    {
        $head = headTransaksi::create([
            'kode_transaksi' => time() . Str::random(5),
            'total_barang' => 0,
            'total_harga' => 0,
            'id_user' => Auth::user()->id,
            'status' => 1,
            'bukti' => 0,
        ]);

        return $head;
    }

    public function saveDetail($id_head)
    {



        try {

            DB::transaction(function () use ($id_head) {

                $headtrans = headTransaksi::find($id_head);


                if ($headtrans) {
                    detailTransaksi::create([
                        "id_transaksi" => $headtrans->id,
                        "id_produk" => $this->id_produk,
                        "qty" => $this->qty,
                        "ukuran" => $this->ukuran,
                        "harga" => $this->harga_produk,
                        "sub_total" => $this->harga_produk * $this->qty,
                    ]);


                    $headtrans->total_barang = $headtrans->detail_transaksi()->pluck('qty')->sum();
                    $headtrans->total_harga = $headtrans->detail_transaksi()->pluck('sub_total')->sum();
                    $headtrans->save();
                }


            });
        } catch (\Throwable $th) {

            throw $th;
            return false;
        }


        return true;


    }
}
