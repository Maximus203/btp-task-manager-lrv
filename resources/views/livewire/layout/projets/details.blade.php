<div class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg shadow-md">

    <div class="mb-4">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="{{ route('details-projet', ["id" => $projet->idProjet]) }}" aria-current="page" 
                   class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">
                    Détail Projet
                </a>
            </li>
            <li class="me-2">
                <a href="{{ route('planning-projet', ["id" => $projet->idProjet]) }}" 
                   class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                    Planning
                </a>
            </li>
        </ul>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom du projet</th>
                    <th scope="col" class="px-6 py-3">Chef de projet</th>
                    <th scope="col" class="px-6 py-3">Client</th>
                    <th scope="col" class="px-6 py-3">Ouvrier</th>
                    <th scope="col" class="px-6 py-3">Budget</th>
                    <th scope="col" class="px-6 py-3">Statut</th>
                    <th scope="col" class="px-6 py-3">Date de début</th>
                    <th scope="col" class="px-6 py-3">Date de fin</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $projet->nomProjet }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $projet->chefDeProjet->nom }} {{ $projet->chefDeProjet->prenom }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->clientProjet->nom }} {{ $projet->clientProjet->prenom }}
                    </td>
                    <td class="px-6 py-4">
                        <!-- Ajoutez ici les informations sur les ouvriers si disponible -->
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->budget }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->statut }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->dateDeDebut }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $projet->dateDeFin }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
