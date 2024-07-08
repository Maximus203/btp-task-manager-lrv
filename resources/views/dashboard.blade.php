<x-app-layout>
    

    <div class="container mx-auto">
       
            
        @if (request()->routeIs("lister-projet"))
            @livewire('layout.projets.lister')
        @endif
    </div>
</x-app-layout>