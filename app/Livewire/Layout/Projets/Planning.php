<?php

namespace App\Livewire\Layout\Projets;

use App\Models\Projet;
use App\Models\Tache;
use Livewire\Component;


class Planning extends Component
{
    // public $idProjet;


    // public function mount($id)
    // {
    //     $this->idProjet = $id;
    // }
    public function render()
    {
        // $taches = Projet::find($this->idProjet);
        $taches = Tache::all();
        return view('livewire.layout.projets.planning', ['taches' => $taches]);
    }
}
