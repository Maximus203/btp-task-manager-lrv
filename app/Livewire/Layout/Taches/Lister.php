<?php

namespace App\Livewire\Layout\Taches;

use App\Models\Tache;
use App\Models\Projet;
use Livewire\Component;

class Lister extends Component
{
    public $selectedProject = null;
    public $projetIdToDelete = null;

    public function render()
    {
        $projets = Projet::all();

        // Filtrer les tâches par projet sélectionné
        $taches = $this->selectedProject ? Tache::where('idProjet', $this->selectedProject)->get() : Tache::all();

        return view('livewire.layout.taches.lister', [
            'taches' => $taches,
            'projets' => $projets,
        ]);
    }

    public function updatedSelectedProject($value)
    {
        $this->selectedProject = $value;
    }

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
