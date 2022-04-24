<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Str;
use File;
class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $artikels = Article::orderBy("name", "DESC")->get();

        if(request()->q != ""){
            $artikels = $artikels->where("name", "LIKE", "%" . request()->q . "%");
        }

        return view("artikels.index", compact("artikels"));
    }

    public function create(){
        $artikel = Article::orderBy("name", "DESC")->get();

        return view("artikels.create", compact("artikel"));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            "image" => "nullable|image|mimes:png,jpeg,jpg"
        ]);


        if($request->hasFile("image")){
            $file = $request->file("image");
            $filename = time() . Str::slug($request->name) . "." . $file->getClientOriginalExtension();

            $file->move(public_path('articles'), $filename);

            $artikel = Article::create([
                "name" => $request->name,
                "description" => $request->description,
                "slug" => Str::slug($request->name),
                "image" => $filename
            ]);
        }

        return redirect(route("artikel.index"))->with(["success" => "Data artikel berhasil ditambah"]);
    }

    public function edit($id){
        $artikel = Article::find($id);
        return view('artikels.edit', compact('artikel'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            "image" => "nullable|image|mimes:png,jpeg,jpg"
        ]);

        $artikel = Article::find($id);

        $filename = $artikel->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('articles'), $filename);
            File::delete(storage_path('app/public/artikels/' . $artikel->image));
        }

        $artikel->update([
            "name" => $request->name,
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            "image" => $filename
        ]);

        return redirect(route("artikel.index"))->with(["success" => "Data artikel berhasil diupdate"]);
    }

    public function destroy($id){
        $artikel = Article::find($id);

        $artikel->delete();

        return redirect(route("artikel.index"))->with(["success" => "Data artikel berhasil dihapus"]);
    }
}
