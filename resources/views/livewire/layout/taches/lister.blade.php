<div style="width: 80%" class="container xl:container mx-auto mt-10 ml-60">
    <div class="mb-4 flex flex-col items-start px-4">
        <!-- Champ de recherche -->
        <div class="w-full mb-4">
            <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Recherche</label>
            <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-100 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher des tâches...">
        </div>
    
        <!-- Filtre par projet -->
        <div class="w-full mb-4">
            <label for="projectFilter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Filtrer par projet</label>
            <select id="projectFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-100 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Tous les projets</option>
                @foreach ($projets as $projet)
                    <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                @endforeach
            </select>
        </div>
                    <a href="{{ route('creer-tache') }}" type="button"
               class="bg-blue-400 text-white py-2 px-6 rounded-lg shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Ajouter
                une tâche</a>
    </div>
    

        <!-- Affichage des tâches -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
            @foreach ($taches as $tache)
                <div class="task bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105" data-id="{{ $tache->idProjet }}">
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

            document.addEventListener('DOMContentLoaded', function() {
                filterTasksByProject();
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
</div>