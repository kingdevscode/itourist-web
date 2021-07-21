<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorieSite = Categorie::select(
                    'categoris.nom',
                    'categoris.description'
                    )
                    ->where('categoris.site', '=', 1)
                    ->latest()
                    ->get();
         $categorieLogement = Categorie::select(
                        'categoris.nom',
                        'categoris.description'
                        )
                        ->where('categoris.logement', '=', 2)
                        ->latest()
                        ->get();
         $categorieArticle = Categorie::select(
                        'categoris.nom',
                        'categoris.description'
                        )
                        ->where('categoris.article', '=', 3)
                        ->latest()
                        ->get();
        return view('categorie.listecategorie', compact('categorieSite', 'categorieLogement', 'categorieArticle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie.ajoutCategorie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->site)) {
            $request->validate([
                'nom' => 'required',
                'description' => 'required'
            ]);
        } else if(isset($request->logement)){
            $request->validate([
                'nom' => 'required',
                'description' => 'required'
            ]);
        } else{
            $request->validate([
                'nom' => 'required',
                'description' => 'required'
            ]);
        }
        $categorie=Categorie::create($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categorie.ajoutCategorie', compact('categorie'));
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
        if (isset($request->site)) {
            $request->validate([
                'nom' => 'required',
                'description' => 'required'
            ]);
        } else if(isset($request->logement)){
            $request->validate([
                'nom' => 'required',
                'description' => 'required'
            ]);
        } else{
            $request->validate([
                'nom' => 'required',
                'description' => 'required'
            ]);
        }
        $categorie = Categorie::findOrFail($id);
        $categorie->update($request->all());
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
        Categorie::findOrFail($id);
        Categorie::destroy($id);
        return back()->with('message_success','Deleted successfuly!');
    }
}
