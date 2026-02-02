<?php

use App\Http\Controllers\user_authcontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

//view
route::get("login", [user_authcontroller::class, 'login_view'])->name("login_view");
route::get("register", [user_authcontroller::class, 'register_view'])->name("register_view");
route::get("edit_profile", [user_authcontroller::class, 'edit_view'])->name("edit_view");




//aksi 
route::post("register", [user_authcontroller::class, 'register'])->name("register.post");
route::post("login", [user_authcontroller::class, 'login'])->name("login.post");
route::post("edit_profile/{id}", [user_authcontroller::class, 'edit'])->name("edit.post");



