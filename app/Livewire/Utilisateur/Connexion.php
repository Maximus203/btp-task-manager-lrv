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

        //$user = User::find('email', $validated['email']);
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            Session::regenerate();
            $this->redirectIntended(default: route('dashboard'), navigate: true);
        } else {
            session()->flash('error', 'Email ou Mot de passe incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.utilisateur.connexion');
    }
}
