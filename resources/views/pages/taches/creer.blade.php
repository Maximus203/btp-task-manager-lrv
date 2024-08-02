<x-app-layout>

    {{-- <livewire:layout.taches.creer /> --}}
    <div class="container mx-auto">
        @livewire('layout.taches.creer', ['idProjet' => $idProjet])
    </div>
</x-app-layout>
