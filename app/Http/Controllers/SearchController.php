<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Logement;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function searchAll(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $sites = Site::select(
            'sites.*',
            'users.id AS uid',
            'users.nom AS poster_name',
            'users.prenom AS poster_pname',
            'users.email AS poster_mail',
            'users.profile AS poster_profile',
            'villes.nom AS ville'
        )->join('categoris','sites.categorie_id', '=', 'categoris.id')
        ->join('users','sites.user_id', '=', 'users.id')
        ->join('villes','sites.ville_id', '=', 'villes.id')
        ->whereNotNull('categoris.site')
        ->Where('sites.nom', 'like', '%'.$request->search.'%')
        ->latest()
        ->get();

        $articles = Article::select(
            'articles.*',
            'categoris.nom as categorie',
            'users.id as uid'
        )
        ->join('categoris','articles.categorie_id', '=', 'categoris.id')
        ->join('users','articles.user_id', '=', 'users.id')
        ->where('articles.nom', 'like', '%'.$request->search.'%')
        ->orWhere('categoris.nom', 'like', '%'.$request->search.'%')
        ->latest()
        ->get();

        $logements = Logement::select(
            'logements.*',
            'categoris.nom as categorie'
        )->join('categoris','logements.categorie_id', '=', 'categoris.id')
        ->where('logements.nom', 'like', '%'.$request->search.'%')
        ->orWhere('categoris.nom', 'like', '%'.$request->search.'%')
        ->latest()
        ->get();

        $users = User::select(
            'users.*',
            'villes.nom as ville'
        )->leftJoin('villes','users.ville_id', '=', 'villes.id')
        ->where('users.nom', 'like', '%'.$request->search.'%')
        ->orWhere('users.prenom', 'like', '%'.$request->search.'%')
        ->latest()
        ->get();

        $search = $request->search;

        return view('result', compact('sites','logements','articles','users','search'));
    }
}
