<?php

namespace App\Livewire\Layout\Projets;

use App\Models\Projet;
use Livewire\Component;

class Lister extends Component
{
    public function render()
    {
        $projets = Projet::all();
        return view('livewire.layout.projets.lister', ['projets' => $projets]);
    }


    public $projetIdToDelete = null;

    public function confirmSupprimer($id)
    {
        $this->projetIdToDelete = $id;
        $this->supprimer($id);
    }

    public function supprimer($id)
    {
        $projet = Projet::find($id);
        if ($projet) {
            $projet->delete();
        }
    }
}