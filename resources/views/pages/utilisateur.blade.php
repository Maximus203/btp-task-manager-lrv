<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (Request::route()->named('register'))
                {{ __('Créer utilisateur') }}
            @elseif (Request::route()->named('login'))
                {{ __('Connexion') }}
            @else
                {{ __('Liste des utilisateurs') }}
            @endif
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if (Request::route()->named('register'))
            @livewire('utilisateur.creer')
        @elseif (Request::route()->named('login'))
            @livewire('utilisateur.connexion')
        @else
            <!-- Affichage de la liste des utilisateurs uniquement lorsque ce n'est ni la création ni la connexion -->
            @livewire('utilisateur.lister')
        @endif
    </div>
</x-app-layout>
