<?php

// namespace App\Livewire\Layout\Taches;

// use App\Models\Tache;
// use App\Models\Projet;
// use Livewire\Component;

// class Lister extends Component
// {
//     public $selectedProject = null;
//     public $tacheIdToDelete = null;

//     public function render()
//     {
//         $projets = Projet::all();

//         // Filtrer les tâches par projet sélectionné
//         $taches = $this->selectedProject ? Tache::where('idProjet', $this->selectedProject)->get() : Tache::all();

//         return view('livewire.layout.taches.lister', [
//             'taches' => $taches,
//             'projets' => $projets,
//         ]);
//     }

//     public function updatedSelectedProject($value)
//     {
//         $this->selectedProject = $value;
//     }

//     public function confirmSupprimer($id)
//     {
//         $this->tacheIdToDelete = $id;
//         $this->supprimer($id);
//     }

//     public function supprimer($id)
//     {
//         $tache = Tache::find($id);
//         if ($tache) {
//             $tache->delete();
//         }
//     }
// }


namespace App\Livewire\Layout\Taches;

use App\Models\Tache;
use App\Models\Projet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Lister extends Component
{
    public $selectedProject = null;
    public $tacheIdToDelete = null;

    public function render()
    {
        $projets = Projet::all();

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Filtrer les tâches par projet sélectionné et par ouvrier assigné
        if ($user->idRole == 3) {  // Si l'utilisateur est un ouvrier (idRole 3)
            $taches = $this->selectedProject ?
                Tache::where('idProjet', $this->selectedProject)->where('ouvrier', $user->id)->get() :
                Tache::where('ouvrier', $user->id)->get();
        } else {
            $taches = $this->selectedProject ? Tache::where('idProjet', $this->selectedProject)->get() : Tache::all();
        }

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
        $this->tacheIdToDelete = $id;
        $this->supprimer($id);
    }

    public function supprimer($id)
    {
        $tache = Tache::find($id);
        if ($tache) {
            $tache->delete();
        }
    }
}
