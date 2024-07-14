<?php

namespace App\Livewire\Layout\Projets;

use Livewire\Component;
use App\Models\Projet;

class Details extends Component
{
    public $idProjet;

    public function mount($id)
    {
        $this->idProjet = $id;
    }

    public function render()
    {
        $projet = Projet::find($this->idProjet);
        return view('livewire.layout.projets.details', [
            'projet' => $projet,
        ]);
    }
}
