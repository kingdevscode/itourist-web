<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Note;
use App\Models\Site;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        $Users = User::select(
            'users.*'
        )
        ->latest()
        ->limit(6)
        ->get();

        $Commentaires = Commentaire::select(
            'commentaires.id'
        )
        ->where('commentaires.speaker_id', '=', Auth::user())
        ->get();
        $nbCommentaires = $Commentaires->count();

        $Notes = Note::select(
            'notes.id'
        )
        ->where('notes.marker_id', '=', Auth::user())
        ->get();
        $nbNotes = $Notes->count();

        $sites = Site::select(
            'sites.*',
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
        )
        ->latest()
        ->get();

        return view('home', [
            'users' => $Users,
            'commentaire' => $nbCommentaires,
            'note' => $nbNotes,
            'sites' => $sites
        ]);
    }
}
