{{-- <!-- resources/views/livewire/layout/main.blade.php -->

<div>
    <div class="mb-4 flex justify-end">
        <a href="{{ route('creer-projet') }}" type="button"
            class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter
            un projet</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nom du Projet</th>
                        <th scope="col" class="px-6 py-3">Chef de projet</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Client</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                </thead>

                <tbody>

                    @foreach ($projets as $projet)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4"><a href= "{{ route('details-projet',["id"=>$projet->idProjet]) }}">{{ $projet->nomProjet }}</a></td>
                            <td class="px-6 py-4">{{ $projet->chefDeProjet->prenom }} {{ $projet->chefDeProjet->nom }}
                            </td>
                            <td class="px-6 py-4">{{ $projet->statut }}</td>
                            <td class="px-6 py-4">{{ $projet->clientProjet->prenom }} {{ $projet->clientProjet->nom }}
                            </td>
                            <td class="px-6 py-4">
                                <a href= "{{ route('modifier-projet',["id"=>$projet->idProjet]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editer</a>
<button onclick="confirmDelete({{ $projet->idProjet }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</button>                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.confirmSupprimer(id);
            }
        })
    }
</script>
    </div> --}}
<!-- resources/views/livewire/layout/projets/lister.blade.php -->
<!-- resources/views/livewire/layout/projets/lister.blade.php -->

<!-- resources/views/livewire/layout/projets/lister.blade.php -->

<!-- resources/views/livewire/layout/projets/lister.blade.php -->
<div style="width: 90%" class="container xl:container mx-auto mt-20 ml-40">
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
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Rechercher...">
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('creer-projet') }}" type="button"
                class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter
                un projet</a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @if ($projets->isEmpty())
            <div class="col-span-full px-4 py-8 text-center">
                <p class="text-gray-600 dark:text-gray-400">Aucun projet trouvé pour "{{ $search }}".</p>
            </div>
        @else
            @foreach ($projets as $projet)
                <!-- ... -->
            @endforeach
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @foreach ($projets as $projet)
            <div class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
                <img class="w-full h-32 object-cover" src="{{ asset('images/btp.png') }}" alt="Image du projet">
                <div class="p-4">
                    <a href="{{ route('details-projet', ['id' => $projet->idProjet]) }}">
                        <h3 class="text-lg font-bold mb-2 text-gray-900 hover:text-teal-500">{{ $projet->nomProjet }}</h3>
                    </a>
                    <p class="text-gray-700 mb-4">{{ $projet->description }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('modifier-projet', ['id' => $projet->idProjet]) }}"
                            class="text-blue-600 hover:text-blue-800 font-medium">Editer</a>
                        <button onclick="confirmDelete({{ $projet->idProjet }})"
                            class="text-red-600 hover:text-red-800 font-medium">Supprimer</button>
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

