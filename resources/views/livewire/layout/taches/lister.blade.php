<div style="width: 80%" class="container xl:container mx-auto mt-10 ml-60">
    <div class="mt-8">
        <!-- resources/views/livewire/layout/taches/lister.blade.php -->
        <div class="mb-4 flex justify-between items-center px-4">
            <div class="w-1/3">
                <label for="projectFilter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Filtrer par projet</label>
                <select wire:model="selectedProject" id="projectFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-100 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Tous les projets</option>
                    @foreach ($projets as $projet)
                        <option value="{{ $projet->id }}">{{ $projet->nomProjet }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('creer-tache') }}" type="button"
               class="text-white bg-gradient-to-r from-[#003c8f] via-[#004bb8] to-[#0061f2] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-[#003c8f] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter
                une tâche</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
            @foreach ($taches as $tache)
                <div class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
                    <div class="p-4 bg-white">
                        <div class="flex items-center justify-between">
                            <a href="{{ route('details-tache', ['id' => $tache->idTache]) }}" class="flex-1">
                                <h3 class="text-lg font-bold mb-2 text-blue-900 hover:text-blue-500">{{ $tache->nomTache }}</h3>
                            </a>
                            <!-- Statut -->
                            <div class="flex items-center space-x-2">
                                <div class="relative w-24 h-2 rounded-full bg-gray-300">
                                    <div class="absolute top-0 left-0 h-2 rounded-full"
                                        style="
                                            width: @switch($tache->statut)
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
                                            background-color: @switch($tache->statut)
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
                                    @switch($tache->statut)
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
                        </div>
                        <p class="text-gray-600 mb-4">{{ $tache->description }}</p>
                        <div class="flex justify-between items-center mt-2">
                            <a href="{{ route('modifier-tache', ['id' => $tache->idTache]) }}"
                               class="text-blue-500 hover:text-blue-700 font-medium">Éditer</a>
                            <button onclick="confirmDelete({{ $tache->idTache }})"
                                    class="text-red-500 hover:text-red-700 font-medium">Supprimer</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Êtes-vous sûr?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
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
</div>