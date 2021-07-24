<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
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
        return view('note.listeNote', compact('note'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user['id']=$id;
        return view('note.ajoutNote',compact('user'));
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
            'marker_id' => $id,
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
        return view('note.detailNote', compact('note'));
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
        return view('note.ajoutNote', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$marker_id)
    {
        $request->validate([
            'note' => 'required|min:1|max:5',
            'user_id' => 'required|numeric'
        ]);
        $request=[
            'marker_id' => $marker_id,
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
