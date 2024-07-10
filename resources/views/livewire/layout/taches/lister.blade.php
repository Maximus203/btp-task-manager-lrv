<div>
   <!-- resources/views/livewire/layout/main.blade.php -->

<div>
   
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mb-4 flex justify-end">
        <a href="{{ route('creer-tache') }}" type="button"
            class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ajouter
            une tache</a>
    </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nom de la Tache</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                         <th scope="col" class="px-6 py-3">Action</th>
                       
                       
                    </tr>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                </thead>

                <tbody>

                    @foreach ($taches as $tache)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4"><a href= "{{ route('details-tache',["id"=>$tache->idTache]) }}">{{ $tache->nomTache }}</a></td>
                            <td class="px-6 py-4">{{ $tache->description }}</td>
                            </td>
                            <td class="px-6 py-4">
                                <a href= "{{ route('modifier-tache',["id"=>$tache->idTache]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editer</a>
                            <button onclick="confirmDelete({{ $tache->idTache }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</button>     
                       </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.confirmSupprimer(id);
            }
        })
    }
</script>
    </div>

</div>
