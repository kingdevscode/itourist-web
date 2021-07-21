<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recuperer tout les articles
        $article = Article::latest()->get();
        return response()->json($article,200);
        return response()->json($article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.ajoutArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'images' => 'required',
            'description' => 'required',
            'estimation' => 'required',
            'categorie_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);
        $data=$request->all();
        if($request->hasFile('images')){
            $nom=$request->file('images')->getClientOriginalName();
            $path='article'.date("H-i-s").'_'.$nom;
            $request->file('images')->move(public_path().'/Articles', $path);
            $data['images']='/Articles'.'/'.$path;
        }
        $article=Article::create($data);
        return response()->json($article,200);
        return back()->with('message_success','Added Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::select(
            'articles.*',
            'users.nom as proprietaire',
            'categoris.nom as categorie'
            )
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->join('categoris', 'articles.categorie_id', '=', 'categoris.id')
            ->where('articles.id', '=', $id)
            ->latest()
            ->get();
        return response()->json($article,200);
        return view('article.detailArticle', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.ajoutArticle', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'images' => 'required',
            'description' => 'required',
            'estimation' => 'required',
            'categorie_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);
        $data=$request->all();
        if($request->hasFile('images')){
            $nom=$request->file('images')->getClientOriginalName();
            $path='article'.date("H-i-s").'_'.$nom;
            $request->file('images')->move(public_path().'/Articles', $path);
            $data['images']='/Articles'.'/'.$path;
        }
        $article = Article::findOrFail($id);
        $article->update($data);
        return response()->json($article,200);
        return back()->with('message_success','Updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id);
        Article::destroy($id);
        return response()->json(null,200);
        return back()->with('message_success','Deleted successfuly!');
    }
}
