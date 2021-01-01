<?php

namespace App\View\Components;

use App\Models\Jeu;
use App\Services\JeuxPrice;
use Illuminate\View\Component;

class CardJeu extends Component {
    public $jeuxPrice;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(JeuxPrice $jeuxPrice) {
        $this->jeuxPrice = $jeuxPrice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view('components.card-jeu');
    }
}
