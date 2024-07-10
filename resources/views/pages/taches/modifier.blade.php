<x-app-layout>
    <div class="container mx-auto">
            @livewire('layout.taches.modifier', [
            "id" => $id,
        ])
    </div>
</x-app-layout>