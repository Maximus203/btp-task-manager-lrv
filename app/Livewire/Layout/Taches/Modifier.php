<?php

namespace App\Livewire\Layout\Taches;

use Livewire\Component;
use App\Models\Tache;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Modifier extends Component
{
    public $nomTache = '';
    public $idProjet = '';
    public $ouvrier = '';
    public $description = '';
    public $budget = '';
    public $statut = '';
    public $dateDeDebut = '';
    public $dateDeFin = '';
    public $idTache;

    public function mount($id)
    {
        $this->idTache = $id;
        $this->loadTache();
    }

    public function loadTache()
    {
        $tache = Tache::find($this->idTache);
        $this->nomTache = $tache->nomTache;
        $this->idProjet = $tache->idProjet;
        $this->ouvrier = $tache->ouvrier;
        $this->description = $tache->description;
        $this->budget = $tache->budget;
        $this->statut = $tache->statut;
        $this->dateDeDebut = $tache->dateDeDebut;
        $this->dateDeFin = $tache->dateDeFin;
    }

    public function submit()
    {
        $validated = $this->validate([
            'nomTache' => 'required|string',
            'idProjet' => 'required',
            'ouvrier' => 'required',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'statut' => ['required', Rule::in(['initial', 'en_cours', 'terminer'])],
            'dateDeDebut' => 'required|date',
            'dateDeFin' => 'required|date|after:dateDeDebut',
        ]);

        $tache = Tache::find($this->idTache);
        $tache->update($validated);

        $this->resetForm();
        return redirect()->route('lister-tache', ['id' => $this->idProjet]);
    }

    private function resetForm()
    {
        $this->nomTache = '';
        $this->idProjet = '';
        $this->ouvrier = '';
        $this->description = '';
        $this->budget = '';
        $this->statut = '';
        $this->dateDeDebut = '';
        $this->dateDeFin = '';
    }

    public function render()
    {
        $projets = Projet::all();
        $ouvriers = User::where("idRole", 3)->get();
        foreach ($ouvriers as $ouvrier) {
            $ouvrier->nomcomplet = $ouvrier->prenom . " " . $ouvrier->nom;
        }

        return view('livewire.layout.taches.modifier', [
            'tache' => $this,
            'projets' => $projets,
            'ouvriers' => $ouvriers,
        ]);
    }
}
