<div style="width: 87%" class="container mx-auto ml-40">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Liste des utilisateurs</h1>
    </div>
    <div style="width: 98%" class="overflow-x-auto bg-[#edf4f9] p-6 rounded-lg shadow-lg">
        <div class="w-1/4">
            <a href="{{ route('register') }}" type="button"
               class="bg-green-500 text-white py-2 px-6 rounded-lg shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-opacity-50 flex items-center justify-center">
                <i class="fas fa-plus mr-2"></i> <!-- Icône d'ajout -->
                Ajouter un utilisateur
            </a>
     
        </div>
        <br>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 bg-white rounded-lg shadow-md">
            <thead class="bg-[#071720] text-white">
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
                                <i class="fas fa-edit"></i> <!-- Icône Modifier -->
                            </a>
                            <button wire:click="supprimer({{ $user->id }})" onclick="confirmDelete({{ $user->id }})"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">
                                <i class="fas fa-trash-alt"></i> <!-- Icône Supprimer -->
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
            confirmButtonColor: '#071720',
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