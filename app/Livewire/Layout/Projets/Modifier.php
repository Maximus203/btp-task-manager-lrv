<?php

namespace App\Livewire\Layout\Projets;

use Livewire\Component;
use App\Models\Projet;
use App\Models\ProjetOuvrier;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class Modifier extends Component
{

    #[Validate('required|string')]
    public $nomProjet = '';
    #[Validate('required|string')]
    public $description = '';
    #[Validate('required|date')]
    public $dateDeDebut = '';
    #[Validate('required|date|after:dateDeDebut')]
    public $dateDeFin = '';
    #[Validate('required|numeric')]
    public $budget = '';
    #[Validate('required|in:initial,en_cours,terminer')]
    public $statut = '';
    #[Validate('required')]
    public $chefProjet = '';
    #[Validate('required')]
    public $client = '';
    #[Validate('array')]
    public $ouvriers = [];

    public $idProjet;

    public function mount($id)
    {
        $this->idProjet = $id;
        $this->loadProjet();
    }

    public function loadProjet()
    {
        $projet = Projet::find($this->idProjet);
        $this->nomProjet = $projet->nomProjet;
        $this->description = $projet->description;
        $this->dateDeDebut = $projet->dateDeDebut;
        $this->dateDeFin = $projet->dateDeFin;
        $this->budget = $projet->budget;
        $this->statut = $projet->statut;
        $this->chefProjet = $projet->chefProjet;
        $this->client = $projet->client;
        $this->ouvriers = ProjetOuvrier::where('idProjet', $this->idProjet)->pluck('ouvrier')->toArray();
    }

    public function submit()
    {
        $validated = $this->validate([
            'nomProjet' => 'required|string',
            'description' => 'required|string',
            'dateDeDebut' => 'required|date',
            'dateDeFin' => 'required|date|after:dateDeDebut',
            'budget' => 'required|numeric',
            'statut' => 'required|in:initial,en_cours,terminer',
            'chefProjet' => 'required',
            'client' => 'required',
            'ouvriers' => 'array',
        ]);

        $projet = Projet::find($this->idProjet);
        $projet->update([
            'nomProjet' => $validated['nomProjet'],
            'budget' => $validated['budget'],
            'dateDeDebut' => $validated['dateDeDebut'],
            'dateDeFin' => $validated['dateDeFin'],
            'description' => $validated['description'],
            'statut' => $validated['statut'],
            'chefProjet' => $validated['chefProjet'],
            'client' => $validated['client'],
        ]);

        ProjetOuvrier::where('idProjet', $this->idProjet)->delete();
        foreach ($validated['ouvriers'] as $ouvrier) {
            ProjetOuvrier::create([
                'idProjet' => $projet->idProjet,
                'ouvrier' => $ouvrier
            ]);
        }

        $this->resetForm();
        return redirect()->route('lister-projet', ['id' => $this->idProjet]);
    }
    private function resetForm()
    {
        $this->nomProjet = '';
        $this->description = '';
        $this->dateDeDebut = '';
        $this->dateDeFin = '';
        $this->budget = '';
        $this->statut = '';
        $this->chefProjet = '';
        $this->client = '';
        $this->ouvriers = [];
    }

    public function render()
    {
        $chefProjets = User::where("idRole", 2)->get();
        foreach ($chefProjets as $chefProjet) {
            $chefProjet->nomcomplet = $chefProjet->prenom . " " . $chefProjet->nom;
        }
        $clients = User::where("idRole", 4)->get();
        foreach ($clients as $client) {
            $client->nomcomplet = $client->prenom . " " . $client->nom;
        }
        $ouvriers = User::where("idRole", 3)->get();
        foreach ($ouvriers as $ouvrier) {
            $ouvrier->nomcomplet = $ouvrier->prenom . " " . $ouvrier->nom;
        }

        return view('livewire.layout.projets.modifier', [
            'projet' => $this,
            "clients" => $clients,
            "chefProjets" => $chefProjets,
            "ouvriersListes" => $ouvriers,
            'ouvrierProjets' => $this->ouvriers
        ]);
    }
}
