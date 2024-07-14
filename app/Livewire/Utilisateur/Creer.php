<?php

namespace App\Livewire\Utilisateur;

use App\Mail\WelcomeEmail;
use App\Mail\WelcomeMail;
use App\Models\Role;
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

    public function genererMDP()
    {
        return Str::random(10);
    }

    public function render()
    {
        $roles = Role::where('idRole', '!=', 1)->get();
        return view('livewire.utilisateur.creer', ['roles' => $roles]);
    }

    public function register()
    {
        $validated = $this->validate();
        $password = $this->genererMDP();
        $validated['password'] = Hash::make($password);
        $user = User::create($validated);
        event(new Registered($user));
        Mail::to($user->email)->queue(new WelcomeMail($user, $password));
        $this->redirect(route('lister-utilisateur'), navigate: true);
        $this->reset();
    }
}
