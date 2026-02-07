<?php

namespace App\Http\Controllers\admin;

use App\Models\headTransaksi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\produk;

class adminDashboard extends Controller
{
    public function index(request $request)
    {

        $produk = produk::with(['detail_trans'])->get();

        $totalSemua = $produk->sum(function ($d) {
            return $d->detail_trans->sum("qty");
        });

        $data = $produk->map(function ($item) use ($totalSemua) {
            return [
                'nama' => $item->nama_prod,
                'detail' => $item->detail_trans,
                'total' => $item->detail_trans->sum('qty'),
                'persentase' => $item->detail_trans->sum('qty') > 0 ? round(($item->detail_trans->sum('qty') / $totalSemua) * 100, 2) : 0
            ];
        });
        $dataSukses = headTransaksi::where('status', '!=', 5)->count();
        $dataGagal = headTransaksi::where('status', 5)->count();
        $semua = headTransaksi::count();

        $d['gagal'] = $semua > 0 ? round(($dataGagal / $semua) * 100, 2) : 0;
        $d['sukses'] = $semua > 0 ? round(($dataSukses / $semua) * 100, ) : 0;


        $d['data'] = $data->sortByDesc("persentase");
        $d['total_transaksi'] = $totalSemua;
        $d['total_produk'] = $produk->count();
        $d['total_user'] = User::count();

        return view("admin.dashboard.index", $d);
    }

}
