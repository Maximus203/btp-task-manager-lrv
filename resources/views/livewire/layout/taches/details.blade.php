<div class="container xl:container mx-auto px-6 md:px-10 lg:px-20 lg:ml-[100px]">
    <div class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg shadow-lg">

        <!-- Bouton de retour -->
        {{-- <div class="mb-6 flex justify-end">
            @if (Auth::user()->idRole === 4)
                <a href="{{ route('dashboard') }}" class="bg-orange-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-600 focus:ring-opacity-50 transition duration-300">
                    Retour au tableau de bord
                </a>
            @else
               
            @endif
        </div> --}}

        <!-- Titre principal -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-[#071720]">Détails de la Tâche</h1>
        </div>

        <!-- Section des détails de la tâche -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-[#071720] text-white">
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
        </div>

        <!-- Section des commentaires -->
        <div class="bg-gray-50  dark:bg-gray-900 p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-2xl font-semibold text-[#071720] mb-4">Commentaires</h2>
            <div class="bg-white dark:bg-gray-1000 rounded-lg shadow-md p-4">
                <ul class="space-y-4">
                    @foreach($commentaires as $commentaire)
                        <li class="flex justify-between items-center">
                            <p class="text-gray-700 dark:text-gray-300">{{ $commentaire }}</p>
                            @if (Auth::user()->idRole !== 4)
                                <button wire:click="confirmDeleteComment('{{ $commentaire }}')" class="text-red-500 hover:text-red-700 focus:outline-none transition duration-300">Supprimer</button>
                            @endif
                        </li>
                    @endforeach
                </ul>
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-[#071720] mb-2">Ajouter un commentaire</h3>
                    <form wire:submit.prevent="submitComment">
                        <textarea wire:model="commentaire" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" rows="3" placeholder="Ajouter un commentaire..."></textarea>
                        @error('commentaire') <span class="text-red-500">{{ $message }}</span> @enderror
                        <button type="submit" class="mt-2 bg-green-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition duration-300">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>

<!-- Section des images -->
<div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md mb-8">
    <h2 class="text-2xl font-semibold text-[#071720] mb-4">Images</h2>
    <div class="bg-gray-50 dark:bg-gray-1000 rounded-lg shadow-md p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if ($imagePath)
                @php
                    $images = explode(',', $imagePath);
                @endphp
                @foreach ($images as $index => $image)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $image) }}" alt="Image de la tâche" class="object-cover w-full h-40 rounded-lg shadow-sm">
                        @if (Auth::user()->idRole !== 4)
                            <button wire:click="deleteImage({{ $index }})" class="absolute top-2 right-2 bg-red-500 text-white hover:bg-red-700 focus:outline-none p-1 rounded-full transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
        @if (Auth::user()->idRole !== 4)
            <form wire:submit.prevent="saveImage" class="mt-4">
                <input type="file" wire:model="image" class="w-full mt-2 text-gray-900 dark:text-gray-100 dark:bg-gray-800">
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
                <button type="submit" class="mt-2 bg-green-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition duration-300">Télécharger</button>
            </form>
        @endif
    </div>
</div>

<!-- Section de rapport -->
@if (Auth::user()->idRole !== 4)
<div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-[#071720] mb-4">Rapport</h2>
    <div class="bg-gray-50 dark:bg-gray-1000 rounded-lg shadow-md p-4">
        <h3 class="text-lg font-semibold text-[#071720] mb-2">Soumettez votre rapport d'avancement (PDF)</h3>
        @if ($rapportPath)
            <div class="mb-4">
                <a href="{{ asset('storage/' . $rapportPath) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">Télécharger le rapport PDF</a>
                <button wire:click="deleteRapport" class="text-red-500 hover:text-red-700 focus:outline-none transition duration-300 ml-4">Supprimer</button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="mb-4 text-red-500">
                {{ session('error') }}
            </div>
        @endif
        @if (!$rapportUploaded)
            <form wire:submit.prevent="saveRapport">
                <input type="file" wire:model="rapport" class="w-full mt-2 text-gray-900 dark:text-gray-100 dark:bg-gray-800">
                @error('rapport') <span class="text-red-500">{{ $message }}</span> @enderror
                <button type="submit" class="mt-2 bg-green-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition duration-300">Télécharger</button>
            </form>
        @endif
    </div>
</div>
@endif


    </div>
</div>

</div>