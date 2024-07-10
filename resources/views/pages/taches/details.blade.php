<x-app-layout>
    <div class="container mx-auto">
            @livewire('layout.taches.details', [
            "id" => $id,
        ])
    </div>
</x-app-layout>