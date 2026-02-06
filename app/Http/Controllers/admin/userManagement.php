<?php

namespace App\Http\Controllers\admin;

use App\addAcount;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userManagement extends Controller
{
    public function index(request $request)
    {

        $user = User::orderBy('role', 'asc');


        if ($request->nama) {
            $user->where('name', 'like', '%' . $request->nama . '%');
        }
        if ($request->role) {
            $user->whereIn('role', $request->role);

        }

        $data['user'] = $user->paginate(10);

        return view("admin.user_management.index", $data);
    }


    public function user_management_add_view()
    {
        return view("admin.user_management.add_user_from_admin");
    }

    public function user_management_add_update_post(request $request, $id = null)
    {

        if ($id) {
            # code...
            $cek = $request->validate([
                "email" => "required|unique:users,email," . $id . ',id',
                "name" => "required",
                "password" => "confirmed",
                "no_telp" => "required|unique:users,no_telp," . $id . ',id',
                "role" => "required",

            ]);

            $request->merge(['id' => $id]);


            // dd($request->all());


        } else {
            $cek = $request->validate([
                "email" => "required|unique:users,email",
                "name" => "required",
                "password" => "confirmed",
                "no_telp" => "required|unique:users,no_telp",
                "role" => "required",

            ]);
        }

        // dd($cek);

        try {
            addAcount::request($request)->save();
            return redirect()->route("user_management_view")->with("success", "Berhasil membuat akun");

            //code...
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withErrors("errors", $th->getMessage());


        }
    }


    public function user_management_edit_view($id)
    {
        $data['user'] = User::find($id);
        return view("admin.user_management.edit_user_from_admin", $data);
    }



    public function user_management_delete($id)
    {

        $user = User::find($id)->delete();

        if ($user) {
            return redirect()->back()->with('success', 'Berhasil menghapus data');
        } else {
            return redirect()->back()->with('errors', 'Ada Kesalahan');


        }
    }

}
