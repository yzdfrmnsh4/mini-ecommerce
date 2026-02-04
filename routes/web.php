<?php

use App\Http\Controllers\admin\adminDashboard as AdminAdminDashboard;
use App\Http\Controllers\admin\kategori;
use App\Http\Controllers\admin\produkController;
use App\Http\Controllers\adminDashboard;
use App\Http\Controllers\user_authcontroller;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('test');
});

//register dan login
route::get("login", [user_authcontroller::class, 'login_view'])->name("login_view");
route::post("login", [user_authcontroller::class, 'login'])->name("login.post");
route::get("register", [user_authcontroller::class, 'register_view'])->name("register_view");
route::post("register", [user_authcontroller::class, 'register'])->name("register.post");


//wajib login

//edit profile user
route::get("edit_profile", [user_authcontroller::class, 'edit_view'])->name("edit_view");
route::post("edit_profile/{id}", [user_authcontroller::class, 'edit'])->name("edit.post");


//admin

Route::prefix('admin')->group(function () {

    route::get("Dashboard", [AdminAdminDashboard::class, 'index'])->name("admin.dashboard.view");



    route::get("kategori", [kategori::class, 'index'])->name("admin.kategori.view");
    route::get("add_kategori", [kategori::class, 'add_kategori_view'])->name("admin.add_kategori.view");
    route::get("edit_kategori/{id}", [kategori::class, 'edit_kategori_view'])->name("admin.edit_kategori.view");
    route::post("delete_kategori/{id}", [kategori::class, 'delete_kategori_post'])->name("admin.delete_kategori.post");
    route::post("kategori_action/{id?}", [kategori::class, 'kategori_post'])->name("admin.kategori.post");



    route::get("produk", [produkController::class, 'index'])->name("admin.produk.view");
    route::get("add_produk_view", [produkController::class, 'add_produk_view'])->name("admin.add_produk.view");
    route::get("edit_produk_view/{id}", [produkController::class, 'edit_produk_view'])->name("admin.edit_produk.view");
    route::post("add_produk_post", [produkController::class, 'add_produk_post'])->name("admin.add_produk.post");
    route::post("edit_produk_post/{id}", [produkController::class, 'edit_produk_post'])->name("admin.edit_produk.post");
    route::post("delete_produk_post/{id}", [produkController::class, 'delete_prod_post'])->name("admin.delete_produk.post");


});




