<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use App\Models\Site;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logement = Logement::select(
            'logements.*',
            'users.nom as nom du guide touristique',
            'categoris.nom as categorie',
            'sites.nom as site approximite'
            )
            ->join('users', 'logements.user_id', '=', 'users.id')
            ->join('categoris', 'logements.categorie_id', '=', 'categoris.id')
            ->join('sites', 'logements.site_id', '=', 'sites.id')
            ->latest()
            ->get();
        return view('logement.listelogement', compact('logement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $site=Site::select(
                'sites.*'
                )
                ->join('users', 'sites.user_id', '=', 'users.id')
                ->where('sites.user_id', '=',$request->user_id)
                ->latest()
                ->get();
        return view('logement.ajoutLogement', compact('site'));
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
            'site_id' => 'required|numeric',
            'categorie_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);
        $data=$request->all();
        if($request->hasFile('images')){
            $nom=$request->file('images')->getClientOriginalName();
            $path='logement'.date("H-i-s").'_'.$nom;
            $request->file('images')->move(public_path().'/Logements', $path);
            $data['images']='/Logements'.'/'.$path;
        }
        $logement=Logement::create($data);
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
        $logement = Logement::select(
            'logements.*',
            'users.nom as nom du guide touristique',
            'categoris.nom as categorie',
            'sites.nom as site approximite'
            )
            ->join('users', 'logements.user_id', '=', 'users.id')
            ->join('categoris', 'logements.categorie_id', '=', 'categoris.id')
            ->join('sites', 'logements.site_id', '=', 'sites.id')
            ->where('logements.id', '=', $id)
            ->latest()
            ->get();
        return view('logement.detailLogement', compact('logement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logement = Logement::findOrFail($id);
        return view('logement.ajoutLogement', compact('logement'));
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
            'site_id' => 'required|numeric',
            'categorie_id' => 'required|numeric',
            'user_id' => 'required|numeric'
        ]);
        $data=$request->all();
        if($request->hasFile('images')){
            $nom=$request->file('images')->getClientOriginalName();
            $path='logement'.date("H-i-s").'_'.$nom;
            $request->file('images')->move(public_path().'/Logements', $path);
            $data['images']='/Logements'.'/'.$path;
        }
        $logement = Logement::findOrFail($id);
        $logement->update($data);
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
        Logement::findOrFail($id);
        Logement::destroy($id);
        return back()->with('message_success','Deleted successfuly!');
    }
}
