<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\Veritrans\Veritrans;

class CartController extends Controller
{
    public function __construct()
    {
        Veritrans::$serverKey = env('MIDTRANS_SERVER_KEY');
        Veritrans::$isProduction = false;
    }

    public function addToCart(Request $request)
    {
        if (!Auth::user()) {
            return redirect()->to('/login-page');
        }

        $this->validate($request, [
            'product_id' => 'required|exists:products,id'
        ]);

        $carts = json_decode($request->cookie('kd-carts'), true);
        $index = $request->product_id;
        if ($carts && array_key_exists($index, $carts)) {
                $carts[$index]['qty'] += $request->qty;
        } else {
            $product = Product::find($request->product_id);
            $carts[$index] = [
                'qty' => 1,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price ?? 0,
                'product_image' => $product->thumbnail ?? '',
                'product_subtotal' => $product->price * 1
            ];
        }

        $cookie = cookie('kd-carts', json_encode($carts), 2880);
        return redirect()->back()->with(['success' => 'Produk Ditambahkan ke Keranjang'])->cookie($cookie);
    }

    public function listCart(){
        $carts = json_decode(request()->cookie("kd-carts"), true);

        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });

        return view("learning.keranjang", compact("carts", "subtotal"));
    }

    public function removeCart(Request $request)
    {
        $index = $request->product_id;
        $carts = json_decode(request()->cookie('kd-carts'), true);
        unset($carts[$index]);
        $cookie = cookie('kd-carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }

}
