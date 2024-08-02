<x-app-layout>
    <div class="container mx-auto">
        @livewire('layout.projets.planning', ['id' => $id])
        {{-- @livewire('layout.taches.creer', ['idProjet' => $id]) --}}
    </div>
</x-app-layout>