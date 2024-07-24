<?php

namespace App\Livewire\Utilisateur;

use App\Models\User;
use Livewire\Component;

class Modifier extends Component
{
    public $userId;
    public $prenom;
    public $nom;
    public $email;
    public $password;
    public $adresse;
    public $telephone;

    public function mount($id)
    {
        $user = User::find($id);
        if ($user) {
            $this->userId = $user->id;
            $this->prenom = $user->prenom;
            $this->nom = $user->nom;
            $this->email = $user->email;
            $this->adresse = $user->adresse;
            $this->telephone = $user->telephone;
        }
    }

    public function updateUser()
    {
        $this->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable|min:8|confirmed',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
        ]);

        $user = User::find($this->userId);
        if ($user) {
            $user->prenom = $this->prenom;
            $user->nom = $this->nom;
            $user->email = $this->email;
            $user->adresse = $this->adresse;
            $user->telephone = $this->telephone;
            if ($this->password) {
                $user->password = bcrypt($this->password);
            }
            $user->save();

            session()->flash('message', 'Utilisateur modifié avec succès.');
            return redirect()->route('lister-utilisateur');
        }
    }

    public function render()
    {
        return view('livewire.utilisateur.modifier');
    }
}
