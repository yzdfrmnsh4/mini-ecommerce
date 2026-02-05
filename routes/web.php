<?php

use App\Http\Controllers\admin\adminDashboard as AdminAdminDashboard;
use App\Http\Controllers\admin\kategori;
use App\Http\Controllers\admin\produkController;
use App\Http\Controllers\admin\userManagement;
use App\Http\Controllers\adminDashboard;
use App\Http\Controllers\user\landingpage;
use App\Http\Controllers\user\produk;
use App\Http\Controllers\user_authcontroller;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [landingpage::class, 'index'])->name("/");

//produk di user
Route::get('/produk_a/{id}', [produk::class, 'detail_produk'])->name("detail_produk");


//register dan login
route::get("login", [user_authcontroller::class, 'login_view'])->name("login_view");
route::post("login", [user_authcontroller::class, 'login'])->name("login.post");
route::get("register", [user_authcontroller::class, 'register_view'])->name("register_view");
route::post("register", [user_authcontroller::class, 'register'])->name("register.post");


//wajib login

// Profile Use

// Route::get('', [user_authcontroller::class, 'profile'])->name("profile_view");
Route::get('pesanan_saya', [user_authcontroller::class, 'pesanan_saya_view'])->name("profile_view");
//edit profile user
route::get("edit_profile", [user_authcontroller::class, 'edit_view'])->name("edit_view");
route::post("edit_profile/{id}", [user_authcontroller::class, 'edit'])->name("edit.post");

//bagian checkout dan masukin ke keranjang
route::get("detail_keranjang", [produk::class, 'detail_keranjang'])->name("detail_keranjang");
route::post("add_cart/{id}", [produk::class, 'add_cart'])->name("add_cart_post");
route::post("saveQty", [produk::class, 'saveQty'])->name("saveQty");
route::post("deleteQty/{id}", [produk::class, 'deleteQty'])->name("deleteQty");




route::post("checkout/{id}", [produk::class, 'checkout'])->name("checkout_normal_post");
route::post("checkout_from_cart", [produk::class, 'checkout_from_cart'])->name("checkout_from_cart");


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


    //user management
    route::get("user_management", [userManagement::class, 'index'])->name("user_management_view");
    route::get("user_management_add_view", [userManagement::class, 'user_management_add_view'])->name("user_management_add_view");
    route::get("user_management_edit_view/{id}", [userManagement::class, 'user_management_edit_view'])->name("user_management_edit_view");
    route::post("user_management_add_update_post/{id?}", [userManagement::class, 'user_management_add_update_post'])->name("user_management_add_update_post");
    route::post("user_management_delete/{id}", [userManagement::class, 'user_management_delete'])->name("user_management_delete");

});




