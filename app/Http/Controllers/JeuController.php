<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Mecanique;
use App\Models\Theme;
use App\Services\JeuxInformation;
use App\Services\JeuxPrice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class JeuController extends Controller
{
    /**
     * List All Jeu
     *
     * @return \Illuminate\View\View
     */

    public function index($filter = 'name', $sort = null)
    {

        if($filter === 'name'){
            if($sort || $sort === null){
                $jeux = Jeu::all()->sortBy('nom');
                $sort = 0;
            } else{
                $jeux = Jeu::all()->sortByDesc('nom');
                $sort = 1;
            }
        } else{

            $jeux = Jeu::all();
            $tabJeux = [];

            switch($filter){
                case 'theme':
                    foreach($jeux as $jeu){
                        if($jeu->theme->id == $sort){
                            $tabJeux[] = $jeu;
                        }
                    }
                    break;
                case 'editeur':
                    foreach($jeux as $jeu){
                        if($jeu->editeur->id == $sort){
                            $tabJeux[] = $jeu;
                        }
                    }
                    break;
                case 'mecaniques':
                    foreach($jeux as $jeu){
                        if(in_array($sort, $jeu->mecaniques()->pluck('mecaniques.id')->toArray())){
                            $tabJeux[] = $jeu;
                        }
                    }
            }
            $jeux = $tabJeux;
        }

        return view('jeu.index', ['jeux' => $jeux, 'sort' => $sort, 'filter' => $filter]);
    }



    /**
     * Show Jeu.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(Request $request,$id)
    {
        //        $jeux = Jeu::all();
        $sort = $request->get('sort',null);

        $jeuxInformation = new JeuxInformation;
        $jeuxPrice = new JeuxPrice;

        $jeu = Jeu::find($id);
        $jeuxInformation->setJeu($jeu);
        $jeuxPrice->setJeu($jeu);

        $jeuxInformation->calculate();
        $jeuxPrice->calculate();

        $sort = $request->get('sort',null);
        if (isset($sort)) {
            $jeuxInformation->setTriComments(1);
        }


        return view('jeu.show', ['jeu' => $jeu, 'jeuxInformation' => $jeuxInformation, 'jeuxPrice' => $jeuxPrice]);
    }

    /**
     * Show rules .
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function rules($id)
    {
        $jeux = Jeu::all();


        $jeu = $jeux->find($id);


        return view('jeu.rules', ['jeu' => $jeu]);
    }

    /**
     * Show the form to create a new jeu.
     *
     * @return Response
     */
    public function create()
    {
        return view('jeu.create');
    }

    /**
     * Store a new Jeu.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nom' => 'required|unique:jeux',
                'description' => 'required',
                'regles' => 'required',
                'langue' => 'required',
                'age' => 'required',
                'nombre_joueurs' => 'required',
                'categorie' => 'required',
                'duree' => 'required',
                'theme' => 'required',
                'editeur' => 'required',

            ],
            [
                'nom.required' => 'Le nom est requis',
                'nom.unique' => 'Le nom doit être unique',
                'description.required' => 'La description est requise',
                'langue.required' => 'Langue requise',
                'regles.required' => 'La régle est requise',
                'age.required' => 'Age est requis',
                'nombre_joueurs.required' => 'Nbre joueurs requis',
                'categorie.required ' => 'Catégorie requise',
                'duree.required' => 'Durée du jeu requise',
                'theme.required' => 'Le théme est requis',
                'editeur.required' => 'L\'editeur est requis',
            ]
        );

        $jeu = new Jeu();
        $jeu->nom = $request->nom;
        $jeu->description = $request->description;
        $jeu->regles = $request->regles;
        $jeu->theme_id = $request->theme;
        $jeu->categorie = $request->categorie;
        $jeu->duree=$request->duree;
        $jeu->age= $request->age;
        $jeu->nombre_joueurs= $request->nombre_joueurs;
        $jeu->langue= $request->langue;
        $jeu->user_id = Auth::user()->id;
        $jeu->editeur_id = $request->editeur;
        $jeu->url_media = 'https://picsum.photos/seed/'.$jeu->nom.'/200/200';

        $jeu->save();

        $jeu->mecaniques()->attach($request->avec_mecaniques);

        $jeu->save();

        return Redirect::route('jeu_index');
    }
}
