<div class="p-6 mt-8 bg-white dark:bg-gray-800 sm:rounded-lg shadow-md">
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Détails de la Tâche</h2>
    </div>
    <div class="mb-4 flex justify-end items-center">
        @if (Auth::user()->idRole === 4)
        <a href="{{ route('dashboard') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Retour au tableau de bord
        </a>
        @else
            <a href="{{ route('lister-tache') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Retour à la liste des tâches
            </a>
        @endif
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom de la Tâche</th>
                    <th scope="col" class="px-6 py-3">Nom du Projet</th>
                    <th scope="col" class="px-6 py-3">Responsable</th>
                    <th scope="col" class="px-6 py-3">Budget</th>
                    <th scope="col" class="px-6 py-3">Statut</th>
                    <th scope="col" class="px-6 py-3">Date de Début</th>
                    <th scope="col" class="px-6 py-3">Date de Fin</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $tache->nomTache }}
                    </th>
                    <td class="px-6 py-4">{{ $tache->projet->nomProjet }}</td>
                    <td class="px-6 py-4">{{ $tache->responsable->nom }} {{ $tache->responsable->prenom }}</td>
                    <td class="px-6 py-4">{{ $tache->budget }}</td>
                    <td class="px-6 py-4">{{ $tache->statut }}</td>
                    <td class="px-6 py-4">{{ $tache->dateDeDebut }}</td>
                    <td class="px-6 py-4">{{ $tache->dateDeFin }}</td>
                </tr>
            </tbody>
        </table>
    </div>

<div class="mt-4">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Commentaires</h3>
    <ul class="mt-2 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow">
        @foreach($commentaires as $commentaire)
            <li class="mb-4 flex justify-between items-center">
                <p class="text-gray-700 dark:text-gray-300">{{ $commentaire }}</p>
                @if (Auth::user()->idRole !== 4)
                    <button wire:click="confirmDeleteComment('{{ $commentaire }}')" class="mt-2 text-red-500 hover:text-red-700 focus:outline-none">Supprimer</button>
                @endif
            </li>
        @endforeach
    </ul>
</div>


    <div class="mt-4">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Ajouter un commentaire</h3>
        <form wire:submit.prevent="submitComment">
            <textarea wire:model="commentaire" class="mt-2 w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-opacity-50 focus:ring-teal-300 dark:bg-gray-700 dark:text-gray-300" rows="3" placeholder="Ajouter un commentaire..."></textarea>
            @error('commentaire') <span class="text-red-500">{{ $message }}</span> @enderror
            <button type="submit" class="mt-2 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ajouter</button>
        </form>
    </div>

    @if (Auth::user()->idRole !== 4) <!-- Vérifie si l'utilisateur n'est pas idRole 4 -->
    <div class="mt-4">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Images</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            @if ($imagePath)
                @php
                    $images = explode(',', $imagePath);
                @endphp
                @foreach ($images as $index => $image)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $image) }}" alt="Image de la tâche" class="object-cover w-full h-40 rounded-lg shadow-sm">
                        <button wire:click="deleteImage({{ $index }})" class="absolute top-0 right-0 mt-2 mr-2 text-white bg-red-500 hover:bg-red-700 focus:outline-none p-1 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
        <form wire:submit.prevent="save" class="mt-4">
            <input type="file" wire:model="image" class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            <button type="submit" class="mt-2 text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Télécharger</button>
        </form>
    </div>
    @endif

    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-50 dark:bg-green-700 text-green-700 dark:text-green-300 rounded-lg shadow-md">
            {{ session('message') }}
        </div>
    @endif
</div>
<script>
    document.addEventListener('livewire:load', function () {
    window.addEventListener('confirmDeleteComment', function () {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')) {
            Livewire.emit('cancelDeleteComment');
        }
    });
});

<<<<<<< HEAD
</script>
=======
</script>
>>>>>>> eca9b093963e46b4b024fa43fdc3fd3a77ccd269
