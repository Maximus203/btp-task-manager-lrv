<?php

namespace App\Livewire\Layout\Projets;

use Livewire\Component;
use App\Models\Projet;
use App\Models\ProjetOuvrier;
use App\Models\User;

class Modifier extends Component
{

    public $idProjet;
    public function mount($id)
    {
        $this->idProjet = $id;
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
        $projetOuvriers = ProjetOuvrier::where('projet_id', $this->idProjet)->get();
        $ouvrierProjets = [];
        foreach ($projetOuvriers as $ouvrier) {
            array_push($ouvrierProjets, $ouvrier->ouvrier);
        }
        $projet = Projet::find($this->idProjet);
        return view('livewire.layout.projets.modifier', [
            'projet' => $projet,
            "clients" => $clients,
            "chefProjets" => $chefProjets,
            "ouvriersListes" => $ouvriers,
            'ouvrierProjets' => $ouvrierProjets,
        ]);
    }
}
