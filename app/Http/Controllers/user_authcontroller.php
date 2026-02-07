<?php

namespace App\Http\Controllers;

use App\addAcount;
use App\Models\headTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class user_authcontroller extends Controller
{


    public function login_view()
    {
        return view("user.auth.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $dataValidation = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($dataValidation) {
            // ...

            $request->session()->regenerate();

            if (Auth::user()->role === 'admin' || Auth::user()->role === 'kasir') {
                return redirect()->route('admin.dashboard.view')->with("success", "berhasil login");
            } elseif (Auth::user()->role === 'pembeli') {
                return redirect()->route('/')->with("success", "berhasil login");

            }
        }


        return redirect()->back()->withInput()->withErrors(["errors" => "Maaf email atau password salah"]);


    }

    public function register_view()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {


        $cek = $request->validate([
            "email" => "required|unique:users,email",
            "name" => "required",
            "password" => "required|confirmed",
            "no_telp" => "required|unique:users,no_telp",

        ]);

        // dd($cek);   

        try {


            $request->merge([
                "role" => "pembeli"
            ]);



            addAcount::request($request)->save();
            return redirect()->route("login_view")->with("success", "Berhasil membuat akun");

            //code...
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors("errors", $th->getMessage());


        }




    }







    public function pesanan_saya_view(request $request)
    {
        $pesan = headTransaksi::with(['detail_transaksi'])->where('id_user', Auth::user()->id);
        if ($request->status) {
            # code...
            $pesan->where("status", $request->status);
        }

        $data['pesanan'] = $pesan->get();

        return view('user.pesanan_saya', $data);
    }
    public function profile_view()
    {
        return view('user.profile');
    }

    public function edit_view()
    {
        $data['data'] = Auth::user();

        return view("user.auth.edit_user", $data);
    }
    public function edit(request $request, $id)
    {



        // dd($request->all());
        $request->validate([
            "email" => "required|unique:users,email," . $id . ',id',
            "name" => "required",
            "no_telp" => "required|unique:users,no_telp," . $id . ',id',
            "password" => "nullable|confirmed",

        ]);

        try {


            $request->merge([
                "role" => "pembeli",
                "id" => $id
            ]);

            if ($request->password) {
                # code...
                $user = Auth()->user();

                if (!Hash::check($request->password_lama, $user->password)) {
                    return back()->withErrors([
                        'password_lama' => 'Password lama salah',
                    ]);
                }

                $user->update([
                    'password' => Hash::make($request->password_baru),
                ]);

            }

            addAcount::request($request)->save();
            return redirect()->back()->with("success", "Berhasil mengubah data diri");

            //code...
        } catch (\Throwable $th) {

            return response()->json($th->getMessage());
            return redirect()->back()->withErrors("errors", $th->getMessage());


        }
    }
    public function logout()
    {

    }
}
