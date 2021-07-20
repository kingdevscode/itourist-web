<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demande=Demande::all();
        return view('demande.listeDemande', compact('demande'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demande.ajoutDemande');
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
            'titre' => 'required',
            'motivation' => 'required',
            'statut' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $demande=Demande::create($request->all());
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
        $demande = Demande::findOrFail($id);
        return view('demande.ajoutDemande', compact('demande'));
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
            'titre' => 'required',
            'motivation' => 'required',
            'statut' => 'required',
            'user_id' => 'required|numeric'
        ]);
        $demande = Demande::findOrFail($id);
        $request=[
            'titre' => $request->titre,
            'motivation' => $request->motivation,
            'statut' => $request->statut,
            'user_id' => $demande->user_id,
            'admin_id' => $request->user_id
        ];
        $demande->update($request);
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
        Demande::findOrFail($id);
        Demande::destroy($id);
        return back()->with('message_success','Deleted successfuly!');
    }
}
