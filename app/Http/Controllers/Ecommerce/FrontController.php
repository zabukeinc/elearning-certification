<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Home;
use App\Product;
use App\Category;
use App\Image;
use App\Article;

class FrontController extends Controller
{
    public function index()
    {
        $home = Home::orderBy("title", "desc")->get();

        return view("learning.index", compact("home"));
    }

    public function kursusSertifikasi()
    {
        $datas = Product::with(["category" => function ($query) {
            $query->where("slug", "=", "berbayar");
        }, "image"])->get();
        return view("learning.kursus-sertifikasi", compact("datas"));
    }

    public function kursusOnDemand()
    {
        return view("learning.kursus-on-demand");
    }

    public function kursusGratis()
    {
        $datas = Product::with(["category" => function ($query) {
            $query->where("slug", "=", "gratis");
        }, "image"])->get();

        return view("learning.kursus-gratis", compact("datas"));
    }

    public function konsulCsms()
    {
        return view("learning.konsul-csms");
    }

    public function konsulArtikel()
    {
        $artikels = Article::orderBy("name", "DESC")->get();

        if (request()->q != "") {
            $artikels = $artikels->where("name", "LIKE", "%" . request()->q . "%");
        }
        return view("learning.konsul-artikel", compact("artikels"));
    }

    public function pusatStandar()
    {
        return view("learning.pusat-standar");
    }

    public function loginPage()
    {
        return view("learning.login");
    }

    public function signupPage()
    {
        return view("learning.signup");
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'regex:/^[a-zA-Z0-9\s]+$/',
        ]);

        $keyword = $request->keyword;
        $result = Product::where('name', 'like', '%' . $keyword . '%')->paginate();

        return view("ecommerce.product-result", compact("result"));
    }

    public function shop()
    {
        $product = Product::orderBy("created_at", "desc")->paginate(10);
        return view("ecommerce.shop", compact("product"));
    }

    public function about()
    {
        return view("ecommerce.about");
    }

    public function contact()
    {
        return view("ecommerce.contact");
    }

    public function showShop($slug)
    {
        $product = Product::with(['category'])->where('slug', $slug)->first();
        $image = Image::with(["product"])->orderBy("created_at", "desc")->get();

        return view("ecommerce.show", compact("product", "image"));
    }

    public function categoryProduct($slug)
    {
        $product = Category::where('slug', $slug)->first()->product()->orderBy('created_at', 'DESC')->paginate(12);
        return view('ecommerce.shop', compact('product'));
    }

    public function showChapter($slug)
    {
        $data = Chapter::with(['product'])->where('slug', $slug)->first();
        return view("ecommerce.chapter", compact("data"));
    }
}
