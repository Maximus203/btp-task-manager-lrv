<?php

// namespace App\Livewire;

// use App\Models\Tache;
// use App\Models\Projet;
// use Livewire\Component;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

// class Dashboard extends Component
// {
//     use AuthorizesRequests;

//     public $taches;
//     public $projets;
//     public $selectedProjetId;
//     public $selectedProjetNom; // Nouvelle propriété pour le nom du projet
//     public $images = [];

//     public function mount()
//     {
//         // Charger les projets disponibles
//         $this->projets = Projet::all();

//         // Charger les tâches pour le premier projet par défaut
//         if ($this->projets->isNotEmpty()) {
//             $this->selectedProjetId = $this->projets->first()->idProjet;
//             $this->selectedProjetNom = $this->projets->first()->nomProjet; // Initialiser le nom du projet
//             $this->loadTaches();
//         }
//     }

//     public function updatedSelectedProjetId()
//     {
//         $this->selectedProjetNom = $this->projets->firstWhere('idProjet', $this->selectedProjetId)->nomProjet; // Mettre à jour le nom du projet
//         $this->loadTaches();
//         $this->loadImages(); // Ajoutez cette ligne pour mettre à jour les images
//     }

//     private function loadImages()
//     {
//         foreach ($this->taches as $tache) {
//             $this->images[$tache->idTache] = $tache->image ? explode(',', $tache->image) : [];
//         }
//     }

//     private function loadTaches()
//     {
//         $this->taches = Tache::where('idProjet', $this->selectedProjetId)
//             ->with('responsable', 'projet')
//             ->get();

//         foreach ($this->taches as $tache) {
//             $this->images[$tache->idTache] = $tache->image ? explode(',', $tache->image) : [];
//         }
//     }



//     public function render()
//     {
//         return view('livewire.dashboard', [
//             'taches' => $this->taches,
//             'projets' => $this->projets,
//         ]);
//     }
// }

namespace App\Livewire;

use App\Models\Tache;
use App\Models\Projet;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Dashboard extends Component
{
    use AuthorizesRequests;

    public $taches;
    public $projets;
    public $selectedProjetId;
    public $selectedProjetNom; // Nouvelle propriété pour le nom du projet
    public $images = [];

    public function mount()
    {
        // Charger les projets disponibles
        $this->projets = Projet::all();

        // Charger les tâches pour le premier projet par défaut
        if ($this->projets->isNotEmpty()) {
            $this->selectedProjetId = $this->projets->first()->idProjet;
            $this->selectedProjetNom = $this->projets->first()->nomProjet; // Initialiser le nom du projet
            $this->loadTaches();
        }
    }

    public function updatedSelectedProjetId()
    {
        $this->selectedProjetNom = $this->projets->firstWhere('idProjet', $this->selectedProjetId)->nomProjet; // Mettre à jour le nom du projet
        $this->loadTaches();
        $this->loadImages(); // Ajoutez cette ligne pour mettre à jour les images
    }

    private function loadImages()
    {
        foreach ($this->taches as $tache) {
            $this->images[$tache->idTache] = $tache->image ? explode(',', $tache->image) : [];
        }
    }

    private function loadTaches()
    {
        $this->taches = Tache::where('idProjet', $this->selectedProjetId)
            ->with('responsable', 'projet')
            ->get();

        foreach ($this->taches as $tache) {
            $this->images[$tache->idTache] = $tache->image ? explode(',', $tache->image) : [];
        }
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'taches' => $this->taches,
            'projets' => $this->projets,
        ]);
    }
}
