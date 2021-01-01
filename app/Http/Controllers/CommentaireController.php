<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'commentaire' => 'required',
                'note' => 'required',
            ],
            [
                'commentaire.required' => 'Le commentaire est requis',
                'note.required' => 'La note est requise',

            ]
        );

        $commentaire = new Commentaire();
        $commentaire->commentaire = $request->commentaire;
        $commentaire->date_com = new DateTime('now');
        $commentaire->user_id = Auth::user()->id;
        $commentaire->jeu_id= $request->jeu_id;
        $commentaire->note= $request->note;


        $commentaire->save();

        return Redirect::route('jeu_index');
    }
}
