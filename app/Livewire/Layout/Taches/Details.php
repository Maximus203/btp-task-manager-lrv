<?php

namespace App\Livewire\Layout\Taches;

use App\Models\Tache;
use Livewire\Component;

class Details extends Component
{
    public $idTache;

    public function mount($id)
    {
        $this->idTache = $id;
    }

    public function render()
    {
        $tache = Tache::with('responsable', 'projet')->find($this->idTache);

        return view('livewire.layout.taches.details', [
            'tache' => $tache,
        ]);
    }
}
