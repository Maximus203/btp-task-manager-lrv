<div>
    <div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
        <b><i><h3 style="text-align: center">Formulaire d'ajout de tache</h3></i></b>
        <br>
        <form class="space-y-6" wire:submit.prevent="submit">

            <div>
                <label for="nomTache" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Nom de la Tâche</label>
                <input type="text" name="nomTache" id="nomTache" wire:model.blur="nomTache" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir le nom de la tâche" required />
                @error('nomTache') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>


            {{-- <div>
                <label for="idProjet" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Projet</label>
                <select id="idProjet" wire:model="idProjet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled>Sélectionner un projet</option>
                    @foreach($projets as $projet)
                        <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                    @endforeach
                </select>
                @error('idProjet') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> --}}
            {{-- <div>
                <label for="idProjet" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Projet</label>
                <input type="hidden" wire:model="idProjet" value="{{ $idProjet }}" />
                @error('idProjet') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div> --}}

             <div>
                <label for="ouvrier" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Sélectionner un ouvrier</label>
                <select id="ouvrier" wire:model="ouvrier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled>Choisir un ouvrier</option>
                    @foreach($ouvriers as $ouvrier)
                        <option value="{{ $ouvrier->id }}">{{ $ouvrier->nomcomplet }}</option>
                    @endforeach
                </select>
                @error('ouvrier') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Description</label>
                <input type="text" name="description" id="description" wire:model.blur="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required />
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="budget" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Budget</label>
                <input type="number" name="budget" id="budget" wire:model.blur="budget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Budget" required />
                @error('budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Statut -->
            <div class="w-full mb-5 group flex flex-row">
                <label for="statut" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Statut</label>
               <br>
                <div class="w-1/4">
                    <x-radio id="rounded-lg" wire:model="statut" rounded="lg" label="Initial" value="initial" xl />
                </div>
                <div class="w-1/4">
                    <x-radio id="rounded-lg" wire:model="statut" rounded="lg" label="En cours" value="en_cours" xl />
                </div>
                <div class="w-1/4">
                    <x-radio id="rounded-lg" wire:model="statut" rounded="lg" label="Terminé" value="terminer" xl />
                </div>
                @error('statut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Dates -->
            <div>
                <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Début</label>
                <input wire:model="dateDeDebut" type="date" name="dateDeDebut" id="dateDeDebut" placeholder="Date de début" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('dateDeDebut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <br>
                <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Fin</label>
                <input wire:model="dateDeFin" type="date" name="dateDeFin" id="dateDeFin" placeholder="Date de fin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('dateDeFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Créer la tâche</button>
        </form>

    </div>
</div>