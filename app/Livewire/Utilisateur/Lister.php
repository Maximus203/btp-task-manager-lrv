<?php

namespace App\Livewire\Utilisateur;

use App\Models\User;
use Livewire\Component;

class Lister extends Component
{

    public function render()
    {
        $users = User::all();
        return view('livewire.utilisateur.lister', compact('users'));
    }
    public function supprimer($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
        }
    }
}
