{{-- <div>
   <div>
    <div>
   <div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
            <b><i><h3 style="text-align: center">Formulaire de modification de tache</h3></i></b>
            <br>
        <form class="space-y-6" wire:submit.prevent="submit">
            <!-- Nom de la tâche -->
            <div>
                <label for="nomTache" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Nom de la Tâche</label>
                <input type="text" name="nomTache" id="nomTache" wire:model.defer="nomTache" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir le nom de la tâche" required />
                @error('nomTache') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Projet -->
            <div>
                <label for="idProjet" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Projet</label>
                <select id="idProjet" wire:model.defer="idProjet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled>Sélectionner un projet</option>
                    @foreach($projets as $projet)
                        <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                    @endforeach
                </select>
                @error('idProjet') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Ouvriers -->
             <div>
                <label for="ouvrier" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Sélectionner un ouvrier</label>
                <select aria-placeholder="l'ouvrier chargé de cette tache" id="ouvrier" wire:model.defer="ouvrier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled>Choisir un ouvrier</option>
                    @foreach($ouvriers as $ouvrier)
                        <option value="{{ $ouvrier->id }}">{{ $ouvrier->nomcomplet }}</option>
                    @endforeach
                </select>
                @error('ouvrier') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Description</label>
                <input type="text" name="description" id="description" wire:model.defer="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required />
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Budget -->
            <div>
                <label for="budget" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Budget</label>
                <input type="number" name="budget" id="budget" wire:model.defer="budget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Budget" required />
                @error('budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Statut -->
            <div class="w-full mb-5 group flex flex-row">
                <label for="statut" class="block w-1/4 mb-2 text-sm font-medium text-gray-500">Statut</label>
                <div class="w-1/4">
                    <input type="radio" id="statut_initial" wire:model="statut" value="initial" class="form-radio" />
                    <label for="statut_initial" class="ml-2">Initial</label>
                </div>
                <div class="w-1/4">
                    <input type="radio" id="statut_en_cours" wire:model="statut" value="en_cours" class="form-radio" />
                    <label for="statut_en_cours" class="ml-2">En cours</label>
                </div>
                <div class="w-1/4">
                    <input type="radio" id="statut_terminer" wire:model="statut" value="terminer" class="form-radio" />
                    <label for="statut_terminer" class="ml-2">Terminé</label>
                </div>
                @error('statut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Dates -->
            <div>
                <label for="dateDeDebut" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Début</label>
                <input type="date" wire:model="dateDeDebut" id="dateDeDebut" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('dateDeDebut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <label for="dateDeFin" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Fin</label>
                <input type="date" wire:model="dateDeFin" id="dateDeFin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('dateDeFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier la tâche</button>
        </form>
    </div>
</div>

</div>
</div> --}}

<div>
    <div>
        <div>
            <div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
                <b><i><h3 style="text-align: center">Formulaire de modification de tache</h3></i></b>
                <br>
                <form class="space-y-6" wire:submit.prevent="submit">
                    @if (Auth::user()->idRole !== 3)
                        <!-- Nom de la tâche -->
                        <div>
                            <label for="nomTache" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Nom de la Tâche</label>
                            <input type="text" name="nomTache" id="nomTache" wire:model.defer="nomTache" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir le nom de la tâche" required />
                            @error('nomTache') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Projet -->
                        <div>
                            <label for="idProjet" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Projet</label>
                            <select id="idProjet" wire:model.defer="idProjet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled>Sélectionner un projet</option>
                                @foreach($projets as $projet)
                                    <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                                @endforeach
                            </select>
                            @error('idProjet') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Ouvriers -->
                        <div>
                            <label for="ouvrier" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Sélectionner un ouvrier</label>
                            <select aria-placeholder="l'ouvrier chargé de cette tache" id="ouvrier" wire:model.defer="ouvrier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled>Choisir un ouvrier</option>
                                @foreach($ouvriers as $ouvrier)
                                    <option value="{{ $ouvrier->id }}">{{ $ouvrier->nomcomplet }}</option>
                                @endforeach
                            </select>
                            @error('ouvrier') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Description</label>
                            <input type="text" name="description" id="description" wire:model.defer="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required />
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Budget -->
                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Budget</label>
                            <input type="number" name="budget" id="budget" wire:model.defer="budget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Budget" required />
                            @error('budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Dates -->
                        <div>
                            <label for="dateDeDebut" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Début</label>
                            <input type="date" wire:model="dateDeDebut" id="dateDeDebut" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            @error('dateDeDebut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            <label for="dateDeFin" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Fin</label>
                            <input type="date" wire:model="dateDeFin" id="dateDeFin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            @error('dateDeFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    <!-- Statut -->
                    <div class="w-full mb-5 group flex flex-row">
                        <label for="statut" class="block w-1/4 mb-2 text-sm font-medium text-gray-500">Statut</label>
                        <div class="w-1/4">
                            <input type="radio" id="statut_initial" wire:model="statut" value="initial" class="form-radio" />
                            <label for="statut_initial" class="ml-2">Initial</label>
                        </div>
                        <div class="w-1/4">
                            <input type="radio" id="statut_en_cours" wire:model="statut" value="en_cours" class="form-radio" />
                            <label for="statut_en_cours" class="ml-2">En cours</label>
                        </div>
                        <div class="w-1/4">
                            <input type="radio" id="statut_terminer" wire:model="statut" value="terminer" class="form-radio" />
                            <label for="statut_terminer" class="ml-2">Terminé</label>
                        </div>
                        @error('statut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier la tâche</button>
                </form>
            </div>
        </div>
    </div>
</div>
