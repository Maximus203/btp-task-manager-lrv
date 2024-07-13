<div class="p-6 bg-white dark:bg-gray-800 sm:rounded-lg shadow-md">

    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Gestion des Tâches</h2>
        <a href="{{ route('creer-tache') }}" type="button"
            class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Ajouter une tâche
        </a>
    </div>

    <div class="mb-4">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-300">
                    Détail Projet
                </a>
            </li>
            <li class="me-2">
                <a href="#" aria-current="page" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">
                    Planning
                </a>
            </li> 
        </ul>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom de la Tâche</th>
                    <th scope="col" class="px-6 py-3">Date de Début</th>
                    <th scope="col" class="px-6 py-3">Date de Fin</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($taches as $tache)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <a href="{{ route('details-tache', ["id" => $tache->idTache]) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                {{ $tache->nomTache }}
                            </a>
                        </td>
                        <td class="px-6 py-4">{{ $tache->dateDeDebut }}</td>
                        <td class="px-6 py-4">{{ $tache->dateDeFin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
