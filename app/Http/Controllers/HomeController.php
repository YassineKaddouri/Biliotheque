<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $livres = Livre::latest()->paginate(6);
        //$livres = Livre::latest()->get();

        return view('home')->with([
            'livres' => $livres,

        ]);

    }

    public function show($slug)
    {
        $livre = Livre::where('slug', $slug)->first();
        return view('show')->with([
            'livre' => $livre
        ]);
    }

    public function delete($slug)
    {
        $livre = Livre::where('slug', $slug)->first();
        //  unlink(public_path('uploads').'/'.$livre->image);
        $livre->Delete();
        return redirect()->route('admin.livres')->with([
            'success' => 'Livre bien supprimer '
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required|min:3|max:100'

        ]);
        if ($request->has('image')) {
            $file = $request->image;
            //332323.yassine.jpg
            print_r($file);
            $image_name = time() . '-' . $file->getClientOriginalName();
            print_r($image_name);
            $file->move(public_path('uploads'), $image_name);
        }
        Livre::create([
            'titre' => $request->titre,
            'slug' => Str::slug($request->titre),
            'description' => $request->description,
            'auteur' => $request->auteur,
            'image' => $image_name,
            'prix' => $request->prix,
            'category' => $request->category,
            'inStock' => $request->inStock


        ]);
        return redirect()->route('home')->with([
            'success' => 'Livre ajouter avec succsess'
        ]);
    }
    public function edit($slug)
    {

        $livre = Livre::where('slug', $slug)->first();
        return view('admin.livres.edit')->with([
            'livre' => $livre
        ]);

    }

    public function update(Request $request, $slug)
    {
        $livre = Livre::where('slug', $slug)->first();
        if ($request->has('image')) {
            $file = $request->image;
            //332323.yassine.jpg
            $image_name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            unlink(public_path('uploads') . '/' . $livre->image);
            $livre->image = $image_name;
        }
        $livre->update([
            'titre' => $request->titre,
            'slug' => Str::slug($request->titre),
            'description' => $request->description,
            'auteur' => $request->auteur,
            'image' => $livre->image,
            'prix' => $request->prix

        ]);
        return redirect()->route('admin.livres')->with([
            'success' => 'Livre bien modifier '
        ]);
    }
    public function search()
    {
        $q = request()->input('q');
        $cat = request()->input('cat');
        $livres = Livre::where('titre', 'like', "%$q%")->where('category', 'like', "%$cat%")->get();

        return view('livre.search')->with([
            'livres' => $livres
        ]);

    }
}
