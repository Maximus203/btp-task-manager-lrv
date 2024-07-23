<?php

namespace App\Livewire\Layout\Projets;

use Livewire\Component;
use App\Models\Projet;
use Livewire\WithFileUploads;

class Details extends Component
{
    use WithFileUploads;
    public $idProjet;
    public $plan;
    public $hasPlan;

    public function mount($id)
    {
        $this->idProjet = $id;
        $this->loadPlanStatus();
    }

    public function loadPlanStatus()
    {
        $projet = Projet::find($this->idProjet);
        $this->hasPlan = !is_null($projet->plan);
    }

    public function uploadPlan()
    {
        $this->validate([
            'plan' => 'image|max:1024', // 1MB Max
        ]);

        $projet = Projet::find($this->idProjet);
        $path = $this->plan->store('plans', 'public');
        $projet->update(['plan' => $path]);

        $this->loadPlanStatus();

        session()->flash('message', 'Plan uploaded successfully.');
    }

    public function deletePlan()
    {
        $projet = Projet::find($this->idProjet);
        $projet->update(['plan' => null]);

        $this->loadPlanStatus();

        session()->flash('message', 'Plan deleted successfully.');
    }

    public function render()
    {
        $projet = Projet::find($this->idProjet);
        return view('livewire.layout.projets.details', [
            'projet' => $projet,
        ]);
    }
}
