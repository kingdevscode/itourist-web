<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nom' => 'required|string|max:50',
            'prenom' => 'string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|string|min:9|max:20',
            'password' => 'min:6|required_with:password-confirm|same:password-confirm',
            'password-confirm' => 'min:6',
            'profile' => 'required|image'
        ]);
        $data=$request->all();
        if(isset($request['profile'])){
            $nom=$request['profile']->getClientOriginalName();
            $path='User'.date("H-i-s").'_'.$nom;
            $request['profile']->move(public_path().'/Profiles', $path);
            $data['profile']='/Profiles'.'/'.$path;
        }
        $data=[
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'profile' => $data['profile'],
            'couverture' => $data['couverture'],
            'password' => Hash::make($data['password']),
        ];
        User::create($data);
        return back()->with('message_success','Added Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function show($id)
    {
        $User = User::select(
            'users.*',
            'villes.nom AS ville'
        )
            ->leftjoin('villes', 'users.ville_id', '=', 'villes.id')
            ->where('users.id', '=', $id)
            ->first();

            //$User->created_at = $User->created_at->diffForHumans();
            /* SELECT users.nom AS user, villes.nom AS ville FROM `users`
            LEFT OUTER JOIN `villes` ON users.ville_id = villes.id WHERE
            users.id=21 */
        // return response()->json($User, 200);

        $Commentaires = Commentaire::select(
            'commentaires.*',
            'users.profile AS profile',
            'users.nom AS user'
        )
            ->join('users', 'commentaires.speaker_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->orderByDesc('created_at')
            ->get();
            $nbCommentaires = $Commentaires->count();

        return view('auth.user-infos', ['user' => $User, 'commentaires' => $Commentaires,
        'nbCommentaires' => $nbCommentaires]);
    }
}
