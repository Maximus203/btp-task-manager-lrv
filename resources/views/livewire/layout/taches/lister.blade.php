<div style="width: 80%" class="container xl:container mx-auto mt-20 ml-64">
<div class="mt-8">
    <!-- resources/views/livewire/layout/taches/lister.blade.php -->
    <div class="mb-4 flex justify-between items-center px-4">
        <div class="w-1/3">
            <label for="projectFilter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Filtrer par projet</label>
            <select wire:model="selectedProject" id="projectFilter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-100 dark:focus:ring-teal-500 dark:focus:border-teal-500">
                <option value="">Tous les projets</option>
                @foreach ($projets as $projet)
                    <option value="{{ $projet->id }}">{{ $projet->nomProjet }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('creer-tache') }}" type="button"
           class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter
            une tâche</a>
      </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @foreach ($taches as $tache)
            <div class="bg-gray-800 text-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
                <div class="p-4">
                    <a href="{{ route('details-tache', ['id' => $tache->idTache]) }}" class="flex justify-between items-center">
                        <h3 class="text-lg font-bold mb-2 hover:text-teal-500">{{ $tache->nomTache }}</h3>
                        <i class="fas fa-tasks text-teal-400"></i>
                    </a>
                    <p class="text-gray-400 mb-4">{{ $tache->description }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('modifier-tache', ['id' => $tache->idTache]) }}"
                           class="text-teal-400 hover:text-teal-600 font-medium">Editer</a>
                        <button onclick="confirmDelete({{ $tache->idTache }})"
                                class="text-red-400 hover:text-red-600 font-medium">Supprimer</button>
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