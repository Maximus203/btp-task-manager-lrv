{{-- <div style="width: 82%" class="container xl:container mt-10 ml-60">
    <!-- Grand titre -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Projet</h1>
        <p class="text-lg text-gray-600">Découvrez tous les projets disponibles</p>
    </div>

    <div class="flex items-center justify-between mb-4 px-4">
        <div class="w-full md:w-auto">
            <form>
                <label for="table-search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-[#e7f1f8] focus:ring-[#003c8f] focus:border-[#003c8f] dark:bg-[#f7f9fc] dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-[#003c8f] dark:focus:border-[#003c8f]" placeholder="Rechercher...">
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('creer-projet') }}" type="button" class="bg-green-500 text-white py-2 px-6 rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Ajouter un projet
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @if ($projets->isEmpty())
            <div class="col-span-full px-4 py-8 text-center">
                <p class="text-[#003c8f] dark:text-gray-400">Aucun projet trouvé pour "{{ $search }}".</p>
            </div>
        @else
            @foreach ($projets as $projet)
                <div class="projet-item bg-[#f7f9fc] shadow-md rounded-lg overflow-hidden relative transform transition duration-500 hover:scale-105">
                    <div class="p-4">
                        <!-- Status Indicator -->
                        <div class="absolute top-4 right-4 flex items-center space-x-2">
                            @switch($projet->statut)
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

                        <a href="{{ route('details-projet', ['id' => $projet->idProjet]) }}">
                            <h3 class="text-lg font-bold mb-2 text-[#071720] hover:text-blue-500">{{ $projet->nomProjet }}</h3>
<center><img style="height: 90px; width: 90px" src="\images\icons8-travailleurs-hommes-peau-type-3-100.png" alt="Illustration du projet" class="object-cover mb-4">
</center>                      
</a>
                        <p class="text-[#071720] mb-4">{{ $projet->description }}</p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('modifier-projet', ['id' => $projet->idProjet]) }}"
                                class="text-[#071720] hover:text-blue-500 font-medium">Editer</a>
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
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#003c8f',
                cancelButtonText: 'Annuler',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('confirmSupprimer', id); // Appel correct de la méthode Livewire
                }
            });
        }
    </script>
    
    <!-- JavaScript pour la recherche -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('table-search');
            const tableRows = document.querySelectorAll('.grid.grid-cols-1.sm\\:grid-cols-2.lg\\:grid-cols-3 > .projet-item');

            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                tableRows.forEach((row) => {
                    const projectName = row.querySelector('h3') ? row.querySelector('h3').textContent.toLowerCase() : '';
                    const projectDescription = row.querySelector('p') ? row.querySelector('p').textContent.toLowerCase() : '';
                    if (projectName.includes(searchTerm) || projectDescription.includes(searchTerm)) {
                        row.style.display = 'block';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</div> --}}

<div style="width: 82%" class="container xl:container mt-10 ml-60">
    <!-- Grand titre -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Projet</h1>
        <p class="text-lg text-gray-600">Découvrez tous les projets disponibles</p>
    </div>

    <div class="flex items-center justify-between mb-4 px-4">
        <div class="w-full md:w-auto">
            <form>
                <label for="table-search" class="sr-only">Rechercher</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-[#e7f1f8] focus:ring-[#003c8f] focus:border-[#003c8f] dark:bg-[#f7f9fc] dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-[#003c8f] dark:focus:border-[#003c8f]" placeholder="Rechercher...">
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('creer-projet') }}" type="button" class="bg-green-500 text-white py-2 px-6 rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Ajouter un projet
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @if ($projets->isEmpty())
            <div class="col-span-full px-4 py-8 text-center">
                <p class="text-[#003c8f] dark:text-gray-400">Aucun projet trouvé pour "{{ $search }}".</p>
            </div>
        @else
            @foreach ($projets as $projet)
                <div class="projet-item bg-[#f7f9fc] shadow-md rounded-lg overflow-hidden relative transform transition duration-500 hover:scale-105">
                    <div class="p-4">
                        <!-- Status Indicator -->
                        <div class="absolute top-4 right-4 flex items-center space-x-2">
                            @switch($projet->statut)
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

                        <a href="{{ route('details-projet', ['id' => $projet->idProjet]) }}">
                            <h3 class="text-lg font-bold mb-2 text-[#071720] hover:text-blue-500">{{ $projet->nomProjet }}</h3>
                            <center>
                                <img style="height: 90px; width: 90px" src="\images\icons8-travailleurs-hommes-peau-type-3-100.png" alt="Illustration du projet" class="object-cover mb-4">
                            </center>
                        </a>
                        <p class="text-[#071720] mb-4">{{ $projet->description }}</p>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('modifier-projet', ['id' => $projet->idProjet]) }}" class="text-[#071720] hover:text-blue-500 font-medium">Editer</a>
                            <button onclick="confirmDelete({{ $projet->idProjet }})" class="text-red-400 hover:text-red-600 font-medium">Supprimer</button>
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
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#003c8f',
                cancelButtonText: 'Annuler',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('confirmSupprimer', id); // Appel correct de la méthode Livewire
                }
            });
        }
    </script>
    
    <!-- JavaScript pour la recherche -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('table-search');
            const tableRows = document.querySelectorAll('.grid.grid-cols-1.sm\\:grid-cols-2.lg\\:grid-cols-3 > .projet-item');

            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                tableRows.forEach((row) => {
                    const projectName = row.querySelector('h3') ? row.querySelector('h3').textContent.toLowerCase() : '';
                    const projectDescription = row.querySelector('p') ? row.querySelector('p').textContent.toLowerCase() : '';
                    if (projectName.includes(searchTerm) || projectDescription.includes(searchTerm)) {
                        row.style.display = 'block';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</div>

