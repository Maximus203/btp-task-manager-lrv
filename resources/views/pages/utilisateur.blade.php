<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (Request::route()->named('register'))
                {{ __('Créer utilisateur') }}
            @elseif (Request::route()->named('login'))
                {{ __('Connexion') }}
            @endif

        </h2>
    </x-slot>
    @if (Request::route()->named('register'))
        @livewire('utilisateur.creer')
    @elseif (Request::route()->named('login'))
        @livewire('utilisateur.connexion')
    @endif

</x-app-layout>
