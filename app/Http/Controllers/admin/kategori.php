<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kategori as ModelsKategori;
use Illuminate\Http\Request;

class kategori extends Controller
{
    public function index(request $request)
    {
        $first = ModelsKategori::query();
        if ($request->nama) {
            $first->where("kategori", 'like', '%' . $request->nama . '%');
        }

        $data['data'] = $first->paginate(10);

        return view("admin.katregori.index", $data);
    }

    public function add_kategori_view(request $request)
    {
        return view("admin.katregori.add_kategori");
    }
    public function edit_kategori_view(request $request, $id)
    {

        $data['kategori'] = \App\Models\kategori::find($id);
        $data['id'] = $id;

        return view("admin.katregori.edit_kategori", $data);
    }
    public function kategori_post(request $request, $id = null)
    {


        if ($id) {
            # code...
            $request->validate([
                'kategori' => "required|unique:kategori,kategori," . $id . ',id',
                "deskripsi" => 'required'
            ]);
        } else {
            $request->validate([
                'kategori' => "required|unique:kategori,kategori",
                "deskripsi" => 'required'
            ]);
        }

        \App\Models\kategori::updateOrCreate(["id" => $id], [
            "kategori" => $request->kategori,
            "deskripsi" => $request->deskripsi,
        ]);


        return redirect()->route("admin.kategori.view")->with("success", "berhasil mengubah data");

    }

    public function delete_kategori_post($id)
    {
        \App\Models\kategori::find($id)->delete();

        return redirect()->back()->with("success", "berhasil mengubah data");
    }
}
