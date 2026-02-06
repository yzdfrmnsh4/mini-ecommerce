<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\detailTransaksi;
use App\Models\headTransaksi;
use App\Models\keranjang;
use App\Models\produk as ModelsProduk;
use App\Models\User;
use App\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class produk extends Controller
{
    public function detail_produk(request $request, $id)
    {

        $data['produk'] = ModelsProduk::find($id);
        return view("user.detail_produk", $data);
    }


    public function add_cart(request $request, $id)
    {


        if (!Auth::check()) {
            return redirect()->back()->withErrors(['errors' => "Maaf anda harus login terlebih dahulu"]);
        }

        $request->validate([
            "qty" => "required|integer",
            "ukuran" => "required|not_in:undefined",
        ]);

        $user = User::find(Auth::user()->id);

        $existing = $user->keranjang()->where('id_produk', $id)->wherePivot("ukuran", $request->ukuran)->first();

        if ($existing) {

            $keranjang = keranjang::find($existing->pivot->id);
            $keranjang->qty = $keranjang->qty + $request->qty;
            $keranjang->save();
            // dd($request->all(), $existing->pivot->qty, $request->qty);
        } else {

            $user->keranjang()->attach($id, [
                'ukuran' => $request->ukuran,
                'qty' => $request->qty,
            ]);
        }


        return redirect()->back()->withInput([
            "size" => $request->ukuran
        ])->with("success", 'berhasil menambah keranjang');

    }

    public function detail_keranjang(request $request)
    {
        $data['keranjang'] = User::find(Auth::user()->id)->keranjang()->get();
        return view('user.keranjang', $data);
    }


    public function saveQty(request $request)
    {
        $request->validate([
            "qty" => 'required'
        ]);

        dd($request->all());

        foreach ($request->qty as $key => $value) {
            # code...
            keranjang::find($key)->update(['qty' => $value]);
        }
        return redirect()->back()->with("success", 'keranjang berhasil di save');

    }
    public function deleteQty($id)
    {
        keranjang::find($id)->delete();

        return redirect()->back()->with("success", 'berhasil menghapus keranjang');
    }



    public function checkout(request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'qty' => 'required',
            "size" => "required|not_in:undefined",
            "harga" => "required",

        ]);

        if (!Auth::check()) {
            return redirect()->back()->withErrors(['errors' => "anda harus login terlebih dahulu"]);
        }


        $data = (new transaksi($request->qty, $request->size, $request->harga, $id))->saveHeadTrans();
        $cek = $data->saveDetail($data->headtrans->id);

        return redirect()->route('pesanan_saya_view');

    }


    public function checkout_from_cart(request $request)
    {
        $request->validate([
            'qty*' => 'required',
            "ukuran*" => "required|not_in:undefined",
            "harga*" => "required",
            "id_produk*" => "required",
        ]);



        $trans = transaksi::saveHeadTranss();



        foreach ($request->id_produk as $key => $value) {
            new transaksi($request['qty'][$key], $request['ukuran'][$key], $request['harga'][$key], $value)->saveDetail($trans->id);
            keranjang::find($key)->delete();
        }

        return redirect()->back()->with("success", 'berhasil mencheckout');




    }


    public function upload_bukti(request $request, $id)
    {
        $request->validate(['bukti' => 'required|image']);
        $head = headTransaksi::find($id);

        if ($request->has("ubah")) {
            if (Storage::disk('public')->exists("bukti/" . $head->bukti)) {
                # code...
                Storage::disk('public')->delete("bukti/" . $head->bukti);
            }
        }


        if ($request->hasFile("bukti")) {

            $bukti = $request->file("bukti");

            $nama = 'bukti_user ' . Str::random(10) . '.' . $bukti->getClientOriginalExtension();

            $cek = $bukti->storeAs("bukti", $nama, "public");


            if ($cek) {

                if ($head) {
                    # code...
                    $head->bukti = $nama;
                    $head->save();
                    return redirect()->back()->with('success', 'berhasil mengupload bukti');
                }
            }
        }





    }
}
