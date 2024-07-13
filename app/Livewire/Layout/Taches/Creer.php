<?php

namespace App\Livewire\Layout\Taches;

use App\Models\Tache;
use App\Models\User;
use App\Models\Projet; // Assurez-vous d'importer le modèle Projet
use Livewire\Component;
use Illuminate\Validation\Rule;

class Creer extends Component
{
    public $idProjet = '';
    public $description = '';
    public $dateDeDebut = '';
    public $dateDeFin = '';
    public $budget = '';
    public $statut = '';
    public $nomTache = '';
    public $ouvrier = '';

    protected function rules()
    {
        return [
            'idProjet' => 'required|exists:projets,idProjet',
            'description' => 'required|string',
            'dateDeDebut' => 'required|date',
            'dateDeFin' => 'required|date|after:dateDeDebut',
            'budget' => 'required|numeric',
            'statut' => ['required', Rule::in(['initial', 'en_cours', 'terminer'])],
            'nomTache' => 'required|string',
            'ouvrier' => 'required|exists:users,id',
        ];
    }

    public function submit()
    {
        $validated = $this->validate();

        Tache::create([
            'idProjet' => $validated['idProjet'],
            'description' => $validated['description'],
            'dateDeDebut' => $validated['dateDeDebut'],
            'dateDeFin' => $validated['dateDeFin'],
            'budget' => $validated['budget'],
            'statut' => $validated['statut'],
            'nomTache' => $validated['nomTache'],
            'ouvrier' => $validated['ouvrier'],
        ]);

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->idProjet = '';
        $this->description = '';
        $this->dateDeDebut = '';
        $this->dateDeFin = '';
        $this->budget = '';
        $this->statut = '';
        $this->nomTache = '';
        $this->ouvrier = '';
    }

    public function render()
    {
        $ouvriers = User::where("idRole", 3)->get()->map(function ($ouvrier) {
            $ouvrier->nomcomplet = $ouvrier->prenom . " " . $ouvrier->nom;
            return $ouvrier;
        });

        $projets = Projet::all();

        return view('livewire.layout.taches.creer', [
            'ouvriers' => $ouvriers,
            'projets' => $projets,
        ]);
    }
}
