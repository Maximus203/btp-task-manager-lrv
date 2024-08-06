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
//     public $pourcentageTerminerEvolution;

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

//         $tachesInitial = 0;
//         $tachesEnCours = 0;
//         $tachesTerminer = 0;

//         foreach ($this->taches as $tache) {
//             $this->images[$tache->idTache] = $tache->image ? explode(',', $tache->image) : [];

//             if ($tache->statut === 'initial') {
//                 $tachesInitial++;
//             } elseif ($tache->statut === 'en_cours') {
//                 $tachesEnCours++;
//             } elseif ($tache->statut === 'terminer') {
//                 $tachesTerminer++;
//             }
//         }

//         $totalTaches = count($this->taches);
//         $this->pourcentageTerminerEvolution = ($tachesTerminer / $totalTaches) * 100;
//     }

//     public function getStatutLabel($statut)
//     {
//         return match ($statut) {
//             'initial' => 'Initial',
//             'en_cours' => 'En cours',
//             'terminer' => 'Terminer',
//             default => 'Inconnu'
//         };
//     }

//     public function render()
//     {
//         return view('livewire.dashboard', [
//             'taches' => $this->taches,
//             'projets' => $this->projets,
//             'getStatutLabel' => [$this, 'getStatutLabel'],
//             'pourcentageTerminerEvolution' => $this->pourcentageTerminerEvolution,
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
    public $selectedProjetNom;
    public $images = [];
    public $pourcentageTerminerEvolution;

    public function mount()
    {
        $clientId = auth()->user()->id;
        $this->projets = Projet::where('client', $clientId)->get();

        if ($this->projets->isNotEmpty()) {
            $this->selectedProjetId = $this->projets->first()->idProjet;
            $this->selectedProjetNom = $this->projets->first()->nomProjet;
            $this->loadTaches();
        }
    }

    public function updatedSelectedProjetId()
    {
        $this->selectedProjetNom = $this->projets->firstWhere('idProjet', $this->selectedProjetId)->nomProjet;
        $this->loadTaches();
    }

    private function loadTaches()
    {
        $this->taches = Tache::where('idProjet', $this->selectedProjetId)
            ->with('responsable', 'projet')
            ->get();

        $tachesInitial = 0;
        $tachesEnCours = 0;
        $tachesTerminer = 0;

        foreach ($this->taches as $tache) {
            $this->images[$tache->idTache] = $tache->image ? explode(',', $tache->image) : [];

            if ($tache->statut === 'initial') {
                $tachesInitial++;
            } elseif ($tache->statut === 'en_cours') {
                $tachesEnCours++;
            } elseif ($tache->statut === 'terminer') {
                $tachesTerminer++;
            }
        }

        $totalTaches = count($this->taches);
        $this->pourcentageTerminerEvolution = ($tachesTerminer / $totalTaches) * 100;
    }

    public function getStatutLabel($statut)
    {
        return match ($statut) {
            'initial' => 'Initial',
            'en_cours' => 'En cours',
            'terminer' => 'Terminer',
            default => 'Inconnu'
        };
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'taches' => $this->taches,
            'projets' => $this->projets,
            'getStatutLabel' => [$this, 'getStatutLabel'],
            'pourcentageTerminerEvolution' => $this->pourcentageTerminerEvolution,
        ]);
    }
}
