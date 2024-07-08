<?php

namespace App\Livewire\Layout\Projets;

use App\Models\Projet;
use Livewire\Component;

class Lister extends Component
{
    public function render()
    {
        $projets = Projet::all();
        return view('livewire.layout.projets.lister', ['projets' => $projets]);
    }
}
