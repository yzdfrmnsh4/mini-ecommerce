<?php

namespace App\Http\Controllers;

use App\addAcount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            return response()->json("berhasil login " . Auth::user()->name);
        }


        return redirect()->back()->withInput()->withErrors(["errors" => "Maaf email atau password salah"]);


    }

    public function register_view()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {


        $request->validate([
            "email" => "required|unique:users,email",
            "name" => "required",
            "password" => "required|confirmed",
            "no_telp" => "required|unique:users,no_telp",

        ]);

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
    public function edit_view()
    {
        $data['data'] = Auth::user();

        return view("user.auth.edit_user", $data);
    }
    public function edit(request $request, $id)
    {


        $request->validate([
            "email" => "required|unique:users,email," . $id . ',id',
            "name" => "required",
            "no_telp" => "required|unique:users,no_telp," . $id . ',id',

        ]);

        try {


            $request->merge([
                "role" => "pembeli",
                "id" => $id
            ]);

            // return response()->json($request);


            addAcount::request($request)->save();
            return redirect()->route("login_view")->with("success", "Berhasil membuat akun");

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
