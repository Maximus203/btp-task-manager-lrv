<?php

// namespace App\Livewire\Layout\Projets;

// use App\Models\Projet;
// use Livewire\Component;
// use Illuminate\Support\Facades\Auth;

// class Lister extends Component
// {
//     public $search = '';
//     public $projets;

//     // public function render()
//     // {
//     //     $this->projets = Projet::where('nomProjet', 'like', '%' . $this->search . '%')
//     //         ->orWhere('description', 'like', '%' . $this->search . '%')
//     //         ->get();

//     //     return view('livewire.layout.projets.lister', ['projets' => $this->projets]);
//     // }
//     public function render()
//     {
//         $user = Auth::user();

//         if ($user->idRole == 2) {
//             $projets = Projet::where('chefProjet', $user->id)->where('nomProjet', 'like', '%' . $this->search . '%')->get();
//         } else {
//             $projets = Projet::where('nomProjet', 'like', '%' . $this->search . '%')->get();
//         }

//         return view('livewire.layout.projets.lister', [
//             'projets' => $projets,
//         ]);
//     }




//     public $projetIdToDelete = null;

//     public function confirmSupprimer($id)
//     {
//         $this->projetIdToDelete = $id;
//         $this->supprimer($id);
//     }

//     public function supprimer($id)
//     {
//         $projet = Projet::find($id);
//         if ($projet) {
//             $projet->delete();
//         }
//     }
// }
namespace App\Livewire\Layout\Projets;

use App\Models\Projet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Lister extends Component
{
    public $search = '';
    public $projets = []; // Initialisation de $projets

    public function mount()
    {
        $this->loadProjets();
    }

    public function updatedSearch()
    {
        $this->loadProjets();
    }

    public function loadProjets()
    {
        $user = Auth::user();

        if ($user->idRole == 2) {
            $this->projets = Projet::where('chefProjet', $user->id)
                ->where(function ($query) {
                    $query->where('nomProjet', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                })
                ->get();
        } else {
            $this->projets = Projet::where('nomProjet', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->get();
        }
    }
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
            $this->loadProjets(); // Recharger la liste des projets après suppression
        }
    }

    public function render()
    {
        return view('livewire.layout.projets.lister', [
            'projets' => $this->projets,
        ]);
    }
}
