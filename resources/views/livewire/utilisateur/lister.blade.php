{{-- <div style="width: 87%"class="container mx-auto mr-30 ml-60">

    <div style="width: 98%" class="overflow-x-auto bg-[#edf4f9] p-6 rounded-lg shadow-lg">
 
        <div class="text-right mb-4">
            <a href="{{ route('register') }}" type="button"
                class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Ajouter un utilisateur
            </a>
        </div>
  
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 bg-white rounded-lg shadow-md">
            <thead class="bg-[#003c8f] text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Prénom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Adresse</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Téléphone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-[#f7f9fc] divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->prenom }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->nom }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->adresse }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->telephone }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($user->role->nomRole === 'Client')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Client
                                </span>
                            @elseif($user->role->nomRole === 'Chef de projet')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Chef de projet
                                </span>
                            @elseif($user->role->nomRole === 'Directeur')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-orange-800">
                                    Directeur
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Ouvrier
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <button wire:click="supprimer({{ $user->id }})" onclick="confirmDelete({{ $user->id }})"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#003c8f',
            cancelButtonText: 'Annuler',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.confirmSupprimer(id);
            }
        })
    }
</script> --}}

<div style="width: 87%" class="container mx-auto mr-30 ml-60">
    <div style="width: 98%" class="overflow-x-auto bg-[#edf4f9] p-6 rounded-lg shadow-lg">
        <div class="text-right mb-4">
            <a href="{{ route('register') }}" type="button"
               class="bg-blue-400 text-white py-2 px-6 rounded-lg shadow hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Ajouter un utilisateur
            </a>
        </div>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 bg-white rounded-lg shadow-md">
            <thead class="bg-[#003c8f] text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Prénom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Adresse</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Téléphone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-[#f7f9fc] divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->prenom }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->nom }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->adresse }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $user->telephone }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($user->role->nomRole === 'Client')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Client
                                </span>
                            @elseif($user->role->nomRole === 'Chef de projet')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Chef de projet
                                </span>
                            @elseif($user->role->nomRole === 'Directeur')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-orange-800">
                                    Directeur
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Ouvrier
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                             <a href="{{ route('modifier-utilisateur', ['id' => $user->id]) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-500">
                                Modifier
                            </a>

                            <button wire:click="supprimer({{ $user->id }})" onclick="confirmDelete({{ $user->id }})"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#003c8f',
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

