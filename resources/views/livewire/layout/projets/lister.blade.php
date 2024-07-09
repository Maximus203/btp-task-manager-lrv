<!-- resources/views/livewire/layout/main.blade.php -->

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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
