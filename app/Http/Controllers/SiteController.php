<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::select(
            'sites.*',
            'users.nom as nom du guide touristique',
            'villes.nom as ville du site',
            'categoris.nom as categorie'
            )
            ->join('users', 'sites.user_id', '=', 'users.id')
            ->join('villes', 'sites.ville_id', '=', 'villes.id')
            ->join('categoris', 'sites.categorie_id', '=', 'categoris.id')
            ->latest()
            ->get();
        return view('site.listeSite', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.ajoutSite');
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
            'categorie_id' => 'required|numeric',
            'ville_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);
        $data=$request->all();
        if($request->hasFile('images')){
            $nom=$request->file('images')->getClientOriginalName();
            $path='site'.date("H-i-s").'_'.$nom;
            $request->file('images')->move(public_path().'/Sites', $path);
            $data['images']='/Sites'.'/'.$path;
        }
        $site=Site::create($data);
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
        $site = Site::select(
            'sites.*',
            'users.nom as nom du guide touristique',
            'villes.nom as ville du site',
            'categoris.nom as categorie'
            )
            ->join('users', 'sites.user_id', '=', 'users.id')
            ->join('villes', 'sites.ville_id', '=', 'villes.id')
            ->join('categoris', 'sites.categorie_id', '=', 'categoris.id')
            ->where('sites.id', '=', $id)
            ->latest()
            ->get();
        return view('site.detailSite', compact('Site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::findOrFail($id);
        return view('site.ajoutSite', compact('site'));
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
            'categorie_id' => 'required|numeric',
            'ville_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);
        $data=$request->all();
        if($request->hasFile('images')){
            $nom=$request->file('images')->getClientOriginalName();
            $path='site'.date("H-i-s").'_'.$nom;
            $request->file('images')->move(public_path().'/Sites', $path);
            $data['images']='/Sites'.'/'.$path;
        }
        $site = Site::findOrFail($id);
        $site->update($data);
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
        Site::findOrFail($id);
        Site::destroy($id);
        return back()->with('message_success','Deleted successfuly!');
    }
}
