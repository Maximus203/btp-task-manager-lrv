<div>
<div>
    
    



<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom du projet
                </th>
                <th scope="col" class="px-6 py-3">
                    Chef de projet
                </th>
                <th scope="col" class="px-6 py-3">
                    Client
                </th>
                <th scope="col" class="px-6 py-3">
                    Ouvrier
                </th>
                <th scope="col" class="px-6 py-3">
                    budget
                </th>
                <th scope="col" class="px-6 py-3">
                    statut
                </th>
                <th scope="col" class="px-6 py-3">
                    date de début
                </th>
                <th scope="col" class="px-6 py-3">
                    date de fin
                </th>

            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
</div>
