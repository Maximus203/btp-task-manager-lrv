<div style="width: 80%" class="container xl:container mx-auto ml-60">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Tâches</h1>
        <p class="text-lg text-gray-600">Découvrez toutes les tâches disponibles</p>
    </div>
    <div class="mb-4 flex items-center justify-between px-4">
        <!-- Filtres alignés sur la même ligne -->
        <div class="flex items-center space-x-4">
            <!-- Champ de recherche -->
            <div class="w-full max-w-xs">
                <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Recherche</label>
                <input type="text" id="search" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-100 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des tâches...">
            </div>

            <!-- Filtre par projet -->
            <div class="w-full max-w-xs">
                <label for="projectFilter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Filtrer par projet</label>
                <select id="projectFilter" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-100 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Tous les projets</option>
                    @foreach ($projets as $projet)
                        <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Bouton Ajouter une tâche -->
        {{-- <a href="{{ route('creer-tache') }}" type="button" class="bg-green-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition duration-300 ease-in-out flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Ajouter une tâche
        </a> --}}
    </div>

    <!-- Affichage des tâches -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @foreach ($taches as $tache)
            <div class="task bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl" data-id="{{ $tache->idProjet }}">
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('details-tache', ['id' => $tache->idTache]) }}" class="flex-1">
                            <h3 class="text-lg font-bold mb-2 text-[#071720] hover:text-blue-600">{{ $tache->nomTache }}</h3>
                        </a>
                        <!-- Statut -->
                        <div class="absolute top-4 right-4 flex items-center space-x-2">
                            @switch($tache->statut)
                                @case('initial')
                                    <div class="w-3 h-3 bg-red-700 rounded-full"></div>
                                    <span class="text-xs text-red-700">Initial</span>
                                    @break
                                @case('en_cours')
                                    <div class="w-3 h-3 bg-orange-400 rounded-full"></div>
                                    <span class="text-xs text-orange-400">En cours</span>
                                    @break
                                @case('terminer')
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    <span class="text-xs text-green-500">Terminé</span>
                                    @break
                                @default
                                    <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                                    <span class="text-xs text-gray-500">Non spécifié</span>
                            @endswitch
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">{{ $tache->description }}</p>
                    <div class="flex justify-between items-center mt-2">
                        <a href="{{ route('modifier-tache', ['id' => $tache->idTache]) }}" class="text-[#071720] hover:text-blue-400 font-medium transition duration-300">Éditer</a>
                        <button onclick="confirmDelete({{ $tache->idTache }})" class="text-red-500 hover:text-red-700 font-medium transition duration-300">Supprimer</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function filterTasks() {
            const searchInput = document.getElementById('search');
            const projectFilter = document.getElementById('projectFilter');
            const tasks = document.querySelectorAll('.task');

            function applyFilters() {
                const searchQuery = searchInput.value.toLowerCase();
                const selectedProject = projectFilter.value;

                tasks.forEach(task => {
                    const taskProjectId = task.getAttribute('data-id');
                    const taskTitle = task.querySelector('h3').innerText.toLowerCase();

                    const matchesSearch = taskTitle.includes(searchQuery);
                    const matchesProject = selectedProject === '' || taskProjectId === selectedProject;

                    if (matchesSearch && matchesProject) {
                        task.style.display = 'block';
                    } else {
                        task.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', applyFilters);
            projectFilter.addEventListener('change', applyFilters);

            // Initial filter application
            applyFilters();
        }

        document.addEventListener('DOMContentLoaded', function() {
            filterTasks();
        });

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