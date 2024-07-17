<div class="p-6 mt-8 bg-white dark:bg-gray-800 sm:rounded-lg shadow-md">
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Détails de la Tâche</h2>
        <a href="{{ route('lister-tache') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Retour à la liste des tâches
        </a>
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
                    <button wire:click="deleteComment('{{ $commentaire }}')" class="mt-2 text-red-500 hover:text-red-700 focus:outline-none">Supprimer</button>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Ajouter un commentaire</h3>
        <form wire:submit.prevent="submitComment">
            <textarea wire:model="commentaire" class="w-full p-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" rows="3"></textarea>
            @error('commentaire') <span class="text-red-500">{{ $message }}</span> @enderror
            <button type="submit" class="mt-2 text-white bg-teal-500 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Soumettre</button>
        </form>
    </div>
</div>