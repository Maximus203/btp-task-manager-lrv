<?php

namespace App\Livewire\Utilisateur;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Connexion extends Component
{
    #[Validate('required|email|string')]
    public $email = '';
    #[Validate('required|string')]
    public $password = '';

    public $remember = '';

    public function login()
    {
        $validated = $this->validate();

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], $this->remember)) {
            Session::regenerate();
            $user = Auth::user();

            switch ($user->idRole) {
                case 4:
                    $this->redirect(route('dashboard'));
                    break;
                case 3:
                    $this->redirect(route('lister-tache'));
                    break;
                case 2:
                case 1:
                    $this->redirect(route('lister-projet'));
                    break;
                default:
                    break;
            }
        } else {
            session()->flash('error', 'Email ou Mot de passe incorrect.');
        }
    }



    public function render()
    {
        return view('livewire.utilisateur.connexion');
    }
}
