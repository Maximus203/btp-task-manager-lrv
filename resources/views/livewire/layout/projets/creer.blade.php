<div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
    <b><i><h3 style="text-align: center">Formulaire d'ajout de projet</h3></i></b>
    <br>
        <form class="space-y-6" wire:submit.prevent="submit">
    
            <!-- Nom du projet -->
            <div>
                <label for="nomProjet" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Nom du projet</label>
                <input type="text" name="nomProjet" id="nomProjet" wire:model.blur="nomProjet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir le nom du projet" required />
                @if ($errors->get("nomProjet"))
                    @foreach ($errors->get("nomProjet") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
    
            <!-- Sélectionner un client -->
            <div>
                <label for="client" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Sélectionner un client</label>
                <select id="client" wire:model="client" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Sélectionner un client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nomcomplet }}</option>
                    @endforeach
                </select>
                @if ($errors->get("client"))
                    @foreach($errors->get("client") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
    
            <!-- Sélectionner un chef de projet -->
            <div>
                <label for="chefProjet" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Sélectionner un chef de projet</label>
                <select id="chefProjet" wire:model="chefProjet" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Sélectionner un chef de projet</option>
                    @foreach($chefProjets as $chefProjet)
                        <option value="{{ $chefProjet->id }}">{{ $chefProjet->nomcomplet }}</option>
                    @endforeach
                </select>
                @if ($errors->get("chefProjet"))
                    @foreach($errors->get("chefProjet") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <!-- Budget -->
    
            <div>
                <label for="budget" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">budget</label>
                <input type="number" name="budget" id="budget" wire:model.blur="budget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir le nom du projet" required />
                @if ($errors->get("budget"))
                    @foreach ($errors->get("budget") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
    
            <!-- Sélectionner des ouvriers -->
            <div>
                <label for="ouvriers" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Sélectionner des ouvriers</label>
                <div wire:ignore>
     <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-gray-700 border border-gray-300 rounded-lg hover:text-white hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:border-gray-500 dark:text-gray-500 dark:hover:text-white dark:hover:bg-gray-500 dark:focus:ring-gray-800 me-2 mb-2" type="button">
        Ajouter des ouvriers
        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>
    
                    <!-- Dropdown menu -->
                    <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Ajouter des ouvriers</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="text" id="input-group-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Chercher un ouvrier">
                            </div>
                        </div>
                        <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                            @foreach($ouvriersListes as $ouvrier)
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-{{ $ouvrier->id }}" type="checkbox" wire:model="ouvriers" value="{{ $ouvrier->id }}" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-item-{{ $ouvrier->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $ouvrier->nomcomplet }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if ($errors->get("ouvriers"))
                    @foreach($errors->get("ouvriers") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
    
            
    
           <div class="w-full mb-5 group flex flex-row">
                <label for="statut" class="block w-1/4 mb-2 text-sm font-medium text-gray-500">Statut</label>
                <div class="w-1/4">
                    <x-radio id="rounded-lg" wire:model="statut" rounded="lg" label="Initial" value="initial" xl />
                </div>
                <div class="w-1/4">
                    <x-radio id="rounded-lg" wire:model="statut" rounded="lg" label="En cours" value="en_cours" xl />
                </div>
                <div class="w-1/4">
                    <x-radio id="rounded-lg" wire:model="statut" rounded="lg" label="Terminé" value="terminer" xl />
                </div>
                 @if ($errors->get("statut"))
                    @foreach ($errors->get("statut") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
    
    
    
            <div>
                <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Début</label>
                <input wire:model="dateDeDebut" type="date" name="dateDeDebut" id="dateDeDebut" placeholder="Date de début" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('dateDeDebut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
<br>
                <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Date de Fin</label>
                <input wire:model="dateDeFin" type="date" name="dateDeFin" id="dateDeFin" placeholder="Date de fin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('dateDeFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
    
             <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">Description</label>
                <textarea id="description" name="description" wire:model.blur="description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir la description du projet" required></textarea>
                @if ($errors->get("description"))
                    @foreach ($errors->get("description") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
    
            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">  Enregistrer</button>
            </div>
        </form>
    </div>