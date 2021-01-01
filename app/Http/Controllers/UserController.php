<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $user = null;
        foreach ($users as $usr) {
            if ($usr->id == Auth::user()->id) {
                $user = $usr;
            }
        }
        return view('users.profile',["user" => $user]);
    }
    function createAchat() {
        return view('users.create_achat');
    }

    function achatStore(Request $request) {
        Log::info("Avant validate".$request);
        $request->validate(
            [
                'jeu_id' => 'required',
                'prix' => 'nullable|numeric',
                'lieu' => 'nullable',
                'date_achat' => 'date|required'
            ],
            [
                'jeu_id.required' => 'Le choix du jeu est requis',
                'prix.numeric' => 'La note doit être numérique',
                'date_achat.date' => 'Le format de la date est incorrect',
                'date_achat.required' => 'La date est obligatoire'
            ]
        );
        Log::info($request);
        $user = Auth::user();
        $user->ludo_perso()->attach(0, ['prix' => $request->prix, 'date_achat' => $request->date_achat, 'lieu' => $request->lieu]);
        // Pas le choix du jeu à modifier
        $user->save();
        return redirect()->route('users.profile');
    }
/** Correction donnée à integer
    function afficheAchat($id) {
        $user = Auth::user();
        $jeu = $user->ludo_perso()->where('jeu_id', $id)->first();
        Log::info($jeu);
        return view('users.afficheAchat', ['jeu' => $jeu]);
    }

    function supprimeAchat(Request $request,$id) {
        if ($request->delete == 'valide') {
            $user = Auth::user();
            $user->ludo_perso()->detach($id);
        }
        return redirect()->route('users.profile');
    }
 */

}
