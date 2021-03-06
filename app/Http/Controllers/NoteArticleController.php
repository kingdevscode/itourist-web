<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NoteArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note=Note::select(
                   'notes.*',
                   'users.nom as touriste'
                )
                ->join('users', 'notes.user_id', '=', 'users.id')
                ->latest()
                ->get();
        return view('note.noteArticle.listeNote', compact('note'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('note.noteArticle.ajoutNote');
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
            'note' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $request=[
            'article_id' => $id,
            'note' => $request->note,
            'user_id' => $request->user_id
        ];
        $note=Note::create($request);
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
        $note=Note::select(
            'notes.*',
            'users.nom as touriste'
         )
         ->join('users', 'notes.user_id', '=', 'users.id')
         ->where('notes.id', '=', $id)
         ->latest()
         ->get();
        return view('note.noteArticle.detailNote', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('note.noteArticle.ajoutNote', compact('note'));
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
            'note' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $request=[
            'article_id' => $article_id,
            'note' => $request->note,
            'user_id' => $request->user_id
        ];
        $note = Note::findOrFail($id);
        $note->update($request);
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
        Note::findOrFail($id);
        Note::destroy($id);
        return back()->with('message_success','Deleted successfuly!');
    }
}
