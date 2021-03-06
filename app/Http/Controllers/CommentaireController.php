<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
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
        return view('commentaire.listeCommentaire', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user['id']=$id;
        return view('commentaire.ajoutCommentaire', compact('user'));
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
            'texte' => 'required|min:1|max:255',
            'user_id' => 'required|numeric'
        ]);
        $request=[
            'speaker_id' => $id,
            'texte' => $request->texte,
            'user_id' => $request->user_id
        ];
        Commentaire::create($request);
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
        return view('commentaire.detailCommentaire', compact('commentaire'));
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
        return view('commentaire.ajoutCommentaire', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$speaker_id)
    {
        $request->validate([
            'texte' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $request=[
            'speaker_id' => $speaker_id,
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
