<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;

class landingpage extends Controller
{
    public function index(request $request)
    {

        $data['produk'] = produk::with(['kategori'])->paginate(10);
        return view('user.landingpage', $data);
    }
}
