<?php

namespace App\Livewire\Layout\Projets;

use App\Models\Projet;
use App\Models\Tache;
use Livewire\Component;

class Planning extends Component
{
    public $idProjet;
    public $projet;
    public $taches;

    public function mount($id)
    {
        $this->idProjet = $id;
        $this->projet = Projet::find($this->idProjet);
        $this->taches = Tache::where('idProjet', $this->idProjet)->get();
    }

    public function render()
    {
        return view('livewire.layout.projets.planning', [
            'projet' => $this->projet,
            'taches' => $this->taches,
        ]);
    }
}
