<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use App\Models\produk;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Str;

class produkController extends Controller
{
    public function index(request $request)
    {

        $produk = produk::query();

        if ($request->nama) {
            $produk->where('nama_prod', 'like', '%' . $request->nama . '%');
        }
        if ($request->kategori) {
            $produk->whereHas('kategori', function ($q) use ($request) {
                return $q->whereIn('kategori', $request->kategori);
            });
        }


        $data['produk'] = $produk->paginate(10);

        return view("admin.produk.index", $data);
    }
    public function add_produk_view(request $request)
    {
        $data['kategori'] = kategori::query()->get();
        return view("admin.produk.add_produk", $data);
    }

    public function add_produk_post(request $request)
    {


        // return response()->json($request->ukuran);

        try {

            DB::transaction(function () use ($request) {
                $request->validate([
                    "nama_prod" => 'required|unique:produk,nama_prod',
                    "deskripsi" => 'required',
                    "harga" => 'required',
                    "ukuran" => 'required|array',
                    "ukuran.*" => 'required',

                    "kategori" => 'required|array',
                    "kategori.*" => 'required',

                    "foto" => 'required|image'
                ]);
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');


                    // Ambil nama asli file
                    $namaFile = $file->getClientOriginalName();

                    // Bisa juga bikin nama random biar unik
                    $namaFileUnik = time() . '_' . Str::random(10) . $file->getClientOriginalExtension();


                    // Pindahkan ke folder 'produk' di storage/app/public
                    $file->storeAs('produk', $namaFileUnik, 'public');
                    $produk = produk::updateOrCreate(["id" => ''], [
                        "nama_prod" => $request->nama_prod,
                        "deskripsi" => $request->deskripsi,
                        "harga" => $request->harga,
                        "ukuran" => json_encode($request->ukuran),
                        "foto" => $namaFileUnik,
                    ]);

                    $produk->kategori()->attach($request->kategori);

                }

            });
            return redirect()->route("admin.produk.view");
        } catch (\Throwable $th) {
            throw $th;
        }

        // return response()->json($request->all());
    }


    public function edit_produk_view(request $request, $id)
    {
        $data['produk'] = produk::with(['kategori'])->find($id);
        $data['kategori'] = kategori::query()->get();
        return view("admin.produk.edit_produk", $data);
    }


    public function edit_produk_post(request $request, $id)
    {



        try {

            DB::transaction(function () use ($request, $id) {
                $request->validate([
                    "nama_prod" => 'required|unique:produk,nama_prod,' . $id . ',id',
                    "deskripsi" => 'required',
                    "harga" => 'required',
                    "ukuran" => 'required|array',
                    "ukuran.*" => 'required',

                    "kategori" => 'required|array',
                    "kategori.*" => 'required',

                    "foto" => 'image'
                ]);
                $produk = produk::updateOrCreate(["id" => $id], [
                    "nama_prod" => $request->nama_prod,
                    "deskripsi" => $request->deskripsi,
                    "harga" => $request->harga,
                    "ukuran" => json_encode($request->ukuran),
                ]);
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $fotoLama = $produk->foto;
                    if ($fotoLama && FacadesStorage::disk('public')->exists('produk/' . $fotoLama)) {
                        FacadesStorage::disk('public')->delete('produk/' . $fotoLama);
                        // return 'ada';
                    }

                    // return ['asu', $fotoLama];



                    // Ambil nama asli file
                    $namaFile = $file->getClientOriginalName();

                    // Bisa juga bikin nama random biar unik
                    $namaFileUnik = time() . '_' . Str::random(10) . $file->getClientOriginalExtension();

                    // Pindahkan ke folder 'produk' di storage/app/public
                    $file->storeAs('produk', $namaFileUnik, 'public');


                    $produk->foto = $namaFileUnik;
                    $produk->save();


                }


                // return 'bentar';

                $produk->kategori()->sync($request->kategori);

            });
            return redirect()->route("admin.produk.view")->with("success");
        } catch (\Throwable $th) {
            throw $th;
        }

        // return response()->json($request->all());
    }




    public function delete_prod_post($id)
    {
        $prod = produk::find($id);


        if ($prod->foto && FacadesStorage::disk("public")->exists("produk/" . $prod->foto)) {
            FacadesStorage::disk("public")->delete("produk/" . $prod->foto);
        }

        $prod->delete();

        return redirect()->back()->with("success", "berhasil mengubah data");
    }



}
