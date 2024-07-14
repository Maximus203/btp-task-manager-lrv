<?php

namespace App\Livewire\Layout\Projets;

use App\Models\Projet;
use Livewire\Component;

class Lister extends Component
{
    public $search = '';
    public $projets;

    public function render()
    {
        $this->projets = Projet::where('nomProjet', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.layout.projets.lister', ['projets' => $this->projets]);
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
