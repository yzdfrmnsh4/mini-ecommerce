<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\headTransaksi;
use App\transaksi;
use Illuminate\Http\Request;

class transaksiManagement extends Controller
{
    public function index(request $request)
    {
        $data['transaksi'] = headTransaksi::with(['detail_transaksi'])->orderBy('status', 'asc')->get();
        return view('admin.transaksi.index', $data);
    }



    public function ubah_transaksi(request $request, $id)
    {
        $request->validate([
            "status" => 'required'
        ]);


        transaksi::changeTransaction($id, $request->status);

        return redirect()->back();
    }
}
