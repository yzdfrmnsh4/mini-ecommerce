<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\headTransaksi;
use App\transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class transaksiManagement extends Controller
{
    public function index(request $request)
    {

        $transaksi = headTransaksi::with(['detail_transaksi'])->orderBy('status', 'asc');

        if ($request->name) {
            $transaksi->whereHas('user', function ($d) use ($request) {
                return $d->where("name", 'like', '%' . $request->name . '%');
            });
        }
        if ($request->status) {
            $transaksi->whereIn('status', $request->status);
        }
        if ($request->tanggal1 && $request->tanggal2) {
            $transaksi->whereBetween('created_at', [$request->tanggal1, $request->tanggal2]);
        }



        $data['transaksi'] = $transaksi->get();
        return view('admin.transaksi.index', $data);
    }



    public function ubah_transaksi(request $request, $id)
    {
        $request->validate([
            "status" => 'required'
        ]);


        transaksi::changeTransaction($id, $request->status);

        return redirect()->back()->with("success", "berhasil mengubah data");
    }


    public function print(request $request)
    {

        $transaksi = headTransaksi::with(['detail_transaksi'])->orderBy('status', 'asc');

        if ($request->name) {
            $transaksi->whereHas('user', function ($d) use ($request) {
                return $d->where("name", 'like', '%' . $request->name . '%');
            });
        }
        if ($request->status) {
            $transaksi->whereIn('status', $request->status);
        }
        if ($request->tanggal1 && $request->tanggal2) {
            $transaksi->whereBetween('created_at', [$request->tanggal1, $request->tanggal2]);
        }





        $data['transaksi'] = $transaksi->get();

        $pdf = Pdf::loadView('admin.transaksi.print.print', $data);
        return $pdf->stream();

        // return view();
    }
}
