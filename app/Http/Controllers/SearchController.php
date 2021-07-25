<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function searchAll(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $site = Site::select(
            'sites.nom'
        )->where('sites.id', '=', $request->search)
    }
}
