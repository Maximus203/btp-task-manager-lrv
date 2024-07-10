<?php

namespace App\Livewire\Layout\Taches;

use App\Models\Tache;
use Livewire\Component;

class Lister extends Component
{ public function render()
    {
        $taches = Tache::all();
        return view('livewire.layout.taches.lister', ['taches' => $taches]);
    }


    public $projetIdToDelete = null;

    public function confirmSupprimer($id)
    {
        $this->projetIdToDelete = $id;
        $this->supprimer($id);
    }

    public function supprimer($id)
    {
        $projet = Tache::find($id);
        if ($projet) {
            $projet->delete();
        }
    }
}
