<?php

namespace App\Livewire\Utilisateur;

use App\Mail\WelcomeEmail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;

class Creer extends Component
{
    #[Validate('required|min:2|string')]
    public $nom = '';
    #[Validate('required|min:3|string')]
    public $prenom = '';
    #[Validate('required|email|string')]
    public $email = '';
    #[Validate('required|numeric')]
    public $idRole = '';
    // #[Validate('required|min:8|string')]  
    // public $password='';
    // #[Validate('required|min:8|string')]  
    // public $password_confirmation='';
    public function genererMDP()
    {
        $password = Str::random(10);
        return $password;
    }
    public function render()
    {
        return view('livewire.utilisateur.creer');
    }

    public function register()
    {

        $validated = $this->validate();

        $password = $this->genererMDP();

        $validated['password'] = $password;

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));


        Mail::to($user->email)->send(new WelcomeMail($user, $password));


        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
