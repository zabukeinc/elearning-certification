<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();



Route::group(["prefix" => "admin", "middleware" => "auth"], function(){
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("/home", "HomeController");
    Route::resource("/artikel", "ArticleController");
    Route::resource("/category", "CategoryController")->except(["create", "show"]);
    Route::resource("/product", "ProductController");
});


Route::get("/", "Ecommerce\FrontController@index")->name("front.index");

Route::get("/kursus-sertifikasi", "Ecommerce\FrontController@kursusSertifikasi")->name("front.kursus-sertifikasi");
Route::get("/kursus-on-demand", "Ecommerce\FrontController@kursusOnDemand")->name("front.kursus-on-demand");
Route::get("/kursus-gratis", "Ecommerce\FrontController@kursusGratis")->name("front.kursus-gratis");
Route::get("/konsul-csms", "Ecommerce\FrontController@konsulCsms")->name("front.konsul-csms");
Route::get("/konsul-artikel", "Ecommerce\FrontController@konsulArtikel")->name("front.konsul-artikel");

Route::get("/pusat-standar", "Ecommerce\FrontController@pusatStandar")->name("front.pusat-standar");

Route::get("/login-page", "Ecommerce\FrontController@loginPage")->name("front.login-page");
Route::get("/signup-page", "Ecommerce\FrontController@signupPage")->name("front.signup-page");


Route::post("search", "Ecommerce\FrontController@search")->name("front.search");
Route::get("/shop", "Ecommerce\FrontController@shop")->name("front.shop");
Route::get("/category/{slug}", "Ecommerce\FrontController@categoryProduct")->name("front.category");
Route::get("/product/{slug}", "Ecommerce\FrontController@showShop")->name("front.show_product");
Route::get("/chapter/{slug}", "Ecommerce\FrontController@showChapter")->name("front.show_chapter");

Route::post("cart", "Ecommerce\CartController@addToCart")->name("front.cart");
Route::post("cart/remove", "Ecommerce\CartController@removeCart")->name("front.remove_cart");
Route::get('/cart', 'Ecommerce\CartController@listCart')->name('front.list_cart');



Route::get("/about", "Ecommerce\FrontController@about")->name("front.about");
Route::get("/contact", "Ecommerce\FrontController@contact")->name("front.contact");


// Register

Route::post('/submitRegister', "AuthLearningController@store")->name("auth.submit_register");
Route::post('/submitLogin', "AuthLearningController@login")->name("auth.submit_login");
Route::get("/userLogout", "AuthLearningController@logout")->name("auth.user-logout");
Route::get('/snaptoken', "SnapController@token")->name("midtrans.snap");
Route::get('/vt', "VtdirectController@vtdirect");