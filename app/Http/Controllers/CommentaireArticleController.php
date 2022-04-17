<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaire=Commentaire::select(
            'commentaires.*',
            'users.nom as touriste'
         )
         ->join('users', 'commentaires.user_id', '=', 'users.id')
         ->latest()
         ->get();
        return view('commentaire.commentaireArticle.listeCommentaire', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $article = Article::select(
            'article.*',
            'users.id AS uid',
            'users.nom AS poster_name',
            'users.prenom AS poster_pname',
            'users.email AS poster_mail',
            'users.profile AS poster_profile',
            'villes.nom AS ville'
        )
        ->join(
            'users',
            'sites.user_id','=', 'users.id'
        )->join(
            'villes',
            'sites.ville_id', '=', 'villes.id'
        )->where('articles.id', '=', $id)
        ->first()
        ->get();

        return view('commentaire.article', compact('article'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'texte' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $request=[
            'article_id' => $id,
            'texte' => $request->texte,
            'user_id' => $request->user_id
        ];
        $commentaire=Commentaire::create($request);
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
        $commentaire=Commentaire::select(
            'commentaires.*',
            'users.nom as touriste'
         )
         ->join('users', 'commentaires.user_id', '=', 'users.id')
         ->where('commentaires.id', '=', $id)
         ->latest()
         ->get();
        return view('commentaire.commentaireArticle.detailCommentaire', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('commentaire.commentaireArticle.ajoutCommentaire', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$article_id)
    {
        $request->validate([
            'texte' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $request=[
            'article_id' => $article_id,
            'texte' => $request->texte,
            'user_id' => $request->user_id
        ];
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->update($request);
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
        Commentaire::findOrFail($id);
        Commentaire::destroy($id);
        return back()->with('message_success','Deleted successfuly!');
    }
}
