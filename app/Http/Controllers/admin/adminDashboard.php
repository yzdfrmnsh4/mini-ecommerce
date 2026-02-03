<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class adminDashboard extends Controller
{
    public function index(request $request)
    {
        return view("admin.dashboard.index");
    }

}
