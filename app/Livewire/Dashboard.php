<?php

namespace App\Livewire;

use App\Models\Tache;
use App\Models\Projet;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Dashboard extends Component
{
    use AuthorizesRequests;

    public $taches;

    public function mount()
    {
        // Charger les tâches ici, par exemple, les premières 10 tâches
        $this->taches = Tache::with('responsable', 'projet')->take(10)->get();
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'taches' => $this->taches,
        ]);
    }
}
