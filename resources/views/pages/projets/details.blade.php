<x-app-layout>
    <div class="container mx-auto">
            @livewire('layout.projets.details', [
            "id" => $id,
        ])
    </div>
</x-app-layout>