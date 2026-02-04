<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
}
