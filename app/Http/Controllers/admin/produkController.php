<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class produkController extends Controller
{
    public function index(request $request)
    {

        return view("admin.produk.index");
    }
    public function add_produk_view(request $request)
    {

        return view("admin.produk.add_produk");
    }
}
