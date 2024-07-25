<div style="width: 90%" class="container xl:container mx-auto mt-20 ml-40">
            <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-[#071720]">Détails du projet</h1>
        </div>
    <div class="p-6 mt-8 bg-white dark:bg-gray-800 sm:rounded-lg shadow-md">    
    <div class="mb-4 flex justify-between items-center">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="{{ route('details-projet', ["id" => $projet->idProjet]) }}" aria-current="page" 
                   class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500 transition-colors duration-200">
                    Détail Projet
                </a>
            </li>
            <li class="me-2">
                <a href="{{ route('planning-projet', ["id" => $projet->idProjet]) }}" 
                   class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-300 transition-colors duration-200">
                    Planning
                </a>
            </li>
        </ul>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-[#071720] text-white">
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
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
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
    <br>
    @if($projet->plan)
        <div class="mt-8">
           <center> <h3 class="text-lg font-semibold mb-2">Plan du projet</h3></center>
            <img src="{{ asset('storage/' . $projet->plan) }}" alt="Plan du projet" class="w-full h-auto mb-4">
          <br>
            <button wire:click="deletePlan"
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-transform transform hover:scale-105">
                Supprimer Plan
            </button>
        </div>
    @else
    <h3 class="text-lg font-semibold mb-2">Uploader le plan du projet</h3>
        <div class="mt-8">
            <form wire:submit.prevent="uploadPlan">
                <input type="file" wire:model="plan" class="mb-2">
                @error('plan') <span class="error text-red-600">{{ $message }}</span> @enderror

                <button type="submit"
                        class="mt-2 bg-green-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 transition duration-300">
                    Upload Plan
                </button>
            </form>
        </div>
    @endif
</div>
</div>


