<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\keranjang;
use App\Models\produk as ModelsProduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            "ukuran" => "required",
        ]);

        $user = User::find(Auth::user()->id);

        $existing = $user->keranjang()->where('id_produk', $id)->wherePivot("ukuran", $request->ukuran)->first();
        if ($existing) {

            $user->keranjang()->updateExistingPivot($id, [
                'qty' => $existing->pivot->qty + $request->qty
            ]);
        } else {

            $user->keranjang()->attach($id, [
                'ukuran' => $request->ukuran,
                'qty' => $request->qty,
            ]);
        }


        return redirect()->back()->withInput();

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

        // dd($value);

        foreach ($request->qty as $key => $value) {
            # code...
            keranjang::find($key)->update(['qty' => $value]);
        }
        return redirect()->back();

    }
    public function deleteQty($id)
    {
        keranjang::find($id)->delete();

        return redirect()->back();
    }
}
