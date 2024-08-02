<div style="width: 90%" class="container xl:container mx-auto mt-20 ml-40">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold text-[#071720]">Les taches du projet</h1>
    </div>
    <div class="p-6 mt-8 bg-white dark:bg-gray-800 sm:rounded-lg shadow-md">
        <div class="mb-4 flex justify-between items-center">
<a href="{{ route('creer-tache', ['idProjet' => $projet->idProjet]) }}" type="button"
   class="mt-2 bg-green-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition duration-300">
   Ajouter une tâche
</a>
        </div>

    <div class="mb-4">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="{{ route('details-projet', ["id" => $projet->idProjet]) }}" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-300 transition-colors duration-200">
                    Détail Projet
                </a>
            </li>
            <li class="me-2">
                <a href="#" aria-current="page" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500 transition-colors duration-200">
                    Planning
                </a>
            </li>

        </ul>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-[#071720] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">Nom de la Tâche</th>
                    <th scope="col" class="px-6 py-3">Date de Début</th>
                    <th scope="col" class="px-6 py-3">Date de Fin</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($taches as $tache)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
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
</div>