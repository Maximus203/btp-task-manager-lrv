<!-- resources/views/livewire/layout/projets/lister.blade.php -->
<div style="width: 90%" class="container xl:container mx-auto mt-10 ml-40">
    <div class="flex items-center justify-between mb-4 px-4">
        <div class="w-full md:w-auto">
            <form>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" type="text" id="table-search"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-[#e7f1f8] focus:ring-[#003c8f] focus:border-[#003c8f] dark:bg-[#f7f9fc] dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-[#003c8f] dark:focus:border-[#003c8f]"
                        placeholder="Rechercher...">
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('creer-projet') }}" type="button"
                class="text-white bg-gradient-to-r from-[#003c8f] via-[#003c8f] to-[#003c8f] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-[#003c8f] dark:focus:ring-[#003c8f] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter
                un projet</a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @if ($projets->isEmpty())
            <div class="col-span-full px-4 py-8 text-center">
                <p class="text-[#003c8f] dark:text-gray-400">Aucun projet trouvé pour "{{ $search }}".</p>
            </div>
        @else
            @foreach ($projets as $projet)
                <div class="bg-[#f7f9fc] shadow-md rounded-lg overflow-hidden relative transform transition duration-500 hover:scale-105">
                    <div class="p-4">
                        <!-- Status Bar -->
                        <div class="absolute top-4 right-4">
                            <div class="relative w-24 h-2 rounded-full bg-gray-300">
                                <div class="absolute top-0 left-0 h-2 rounded-full"
                                    style="
                                    width: @switch($projet->statut)
                                        @case('initial')
                                            10%; 
                                            @break
                                        @case('en_cours')
                                            50%; 
                                            @break
                                        @case('terminer')
                                            100%; 
                                            @break
                                        @default
                                            80%; 
                                    @endswitch
                                    background-color: @switch($projet->statut)
                                        @case('initial')
                                            #f44336; 
                                            @break
                                        @case('en_cours')
                                            #ff9800; 
                                            @break
                                        @case('terminer')
                                            #4caf50; 
                                            @break
                                        @default
                                            #ff9855; 
                                    @endswitch
                                "
                                ></div>
                            </div>
                            <span class="text-sm font-medium text-gray-400">
                                @switch($projet->statut)
                                    @case('initial')
                                        10%
                                        @break
                                    @case('en_cours')
                                        50%
                                        @break
                                    @case('terminer')
                                        100%
                                        @break
                                    @default
                                        80%
                                @endswitch
                            </span>
                        </div>

                        <a href="{{ route('details-projet', ['id' => $projet->idProjet]) }}">
                            <h3 class="text-lg font-bold mb-2 text-[#003c8f] hover:text-teal-500">{{ $projet->nomProjet }}</h3>
                        </a>
                        <p class="text-gray-700 mb-4">{{ $projet->description }}</p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('modifier-projet', ['id' => $projet->idProjet]) }}"
                                class="text-[#003c8f] hover:text-teal-600 font-medium">Editer</a>
                            <button onclick="confirmDelete({{ $projet->idProjet }})"
                               class="text-red-400 hover:text-red-600 font-medium">Supprimer</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: 'Êtes-vous sûr?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#003c8f',
                    cancelButtonText: 'Annuler',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.confirmSupprimer(id);
                }
            })
        }
    </script>
</div>