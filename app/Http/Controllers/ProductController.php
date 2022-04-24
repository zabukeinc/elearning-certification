<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with(["category", "image"])->orderBy("created_at", "DESC");

        if (request()->q != "") {
            $product = $product->where("name", "LIKE", "%" . request()->q . "%");
        }

        $product = $product->paginate(10);

        return view("products.index", compact("product"));
    }

    public function create()
    {
        $category = Category::orderBy("name", "DESC")->get();

        return view("products.create", compact("category"));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            "quantity" => $request->quantity,
            // "thumbnail" => $this->thumbnail($request->image[0], $request->name)
        ]);
        if ($request->hasFile("image")) {

            // foreach ($request->file('image') as $fileProduct) {
            //     $filename = time() .  '.' . $fileProduct->getClientOriginalExtension();
            //     $fileProduct->move(public_path('products'), $filename);
            //     $product->image()->create(['filename' => $filename]);
            // }
        }

        return redirect(route("product.index"))->with(["success" => "Produk berhasil ditambah"]);
    }

    public function thumbnail($image, $name)
    {
        $file = $image->getClientOriginalExtension();
        $thumbnail = 'thumbnail-' . time() . Str::slug($name) . '.' . $file;
        $image->move(public_path('products'), $thumbnail);

        return $thumbnail;
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.edit', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
        ]);

        $product = Product::find($id);

        $product->update([
            "name" => $request->name,
            "description" => $request->description,
            "category_id" => $request->category_id,
            "price" => $request->price,
        ]);

        return redirect(route("product.index"))->with(["success" => "Data produk berhasil diupdate"]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(storage_path('app/public/products/' . $product->image));
        $product->image()->delete();
        $product->delete();

        return redirect(route("product.index"))->with(["success" => "Produk berhasil dihapus"]);
    }
}
