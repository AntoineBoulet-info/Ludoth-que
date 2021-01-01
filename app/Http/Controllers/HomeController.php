<?php

namespace App\Http\Controllers;


use App\Models\Jeu;
use App\Models\User;
use App\Services\JeuxPrice;
use Illuminate\Http\Request;

class HomeController extends Controller {
    function cinqAleatoires() {
        $jeu_ids = Jeu::all()->pluck('id');
        $faker = \Faker\Factory::create();
        $ids = $faker->randomElements($jeu_ids->toArray(), 5);
        $jeuxPrice = [];
        foreach ($ids as $id) {
            $jeuPrice = new JeuxPrice();
            $jeuPrice->setJeu(Jeu::find($id));
            $jeuPrice-> calculate();
            $jeuxPrice[] = $jeuPrice;

        }

        return view('marathon_accueil', ['jeuxPrice' => $jeuxPrice]);
    }
//affiche seulement le meilleur jeu, pas les 5 meilleurs :(
    function cinqMeilleurs(){
        $ids = Jeu::all()->pluck('id');
        $tab = [];
        $jeuxPrice = [];
        foreach($ids as $id){
            $jeuPrice = new JeuxPrice();
            $jeuPrice->setJeu(Jeu::find($id));
            $jeuPrice-> calculate();
            $tab[$id] = $jeuPrice->getAverage();
           // $jeuxPrice[] = $jeuPrice;
        }
        arsort($tab);
        $i=0;
        foreach($tab as $k=>$v) {
            $jeuPrice = new JeuxPrice();
            $jeuPrice->setJeu(Jeu::find($k));
            $jeuPrice-> calculate();
            $jeuxPrice[] = $jeuPrice;
            $i++;
            if($i>=5)
                break;
        }



        return view('jeu.meilleur', ['jeuxPrice' => $jeuxPrice]);

    }

    /**
     * home Page
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $users = User::all();

        return view('home.index', ['users' => $users]);
    }
}
