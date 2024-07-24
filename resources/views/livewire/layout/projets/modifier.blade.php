<div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
    <b><i><h3 style="text-align: center; color: #003c8f;">Formulaire de modification de projet</h3></i></b>
    <br>
    <form class="space-y-6" wire:submit.prevent="submit">
        <!-- Nom du projet -->
        <div>
            <label for="nomProjet" class="block text-sm font-medium text-[#003c8f] mb-2">Nom du projet</label>
            <input type="text" name="nomProjet" id="nomProjet" wire:model="nomProjet" value="{{old('nomProjet',$projet->nomProjet)}}" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder="Saisir le nom du projet" required />
            @if ($errors->get("nomProjet"))
                @foreach ($errors->get("nomProjet") as $error)
                    <span class="text-red-500 text-sm">{{ $error }}</span>
                @endforeach
            @endif
        </div>

        <!-- Sélectionner un client -->
        <div>
            <label for="client" class="block text-sm font-medium text-[#003c8f] mb-2">Sélectionner un client</label>
            <select id="client" wire:model="client" required class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5">
                <option selected>Sélectionner un client</option>
                @foreach($clients as $client)
                @if ($projet->client==$client->id)
                   <option selected value="{{ $client->id }}">{{ $client->nomcomplet }}</option>
                @else
                    <option value="{{ $client->id }}">{{ $client->nomcomplet }}</option>
                @endif
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
            <label for="chefProjet" class="block text-sm font-medium text-[#003c8f] mb-2">Sélectionner un chef de projet</label>
            <select id="chefProjet" wire:model="chefProjet" value="{{old('chefProjet')}}" required class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5">
                <option selected>Sélectionner un chef de projet</option>
                @foreach($chefProjets as $chefProjet)
                @if ($projet->chefProjet==$chefProjet->id)
                   <option selected value="{{ $chefProjet->id }}">{{ $chefProjet->nomcomplet }}</option>
                @else
                    <option value="{{ $chefProjet->id }}">{{ $chefProjet->nomcomplet }}</option>
                @endif
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
            <label for="budget" class="block text-sm font-medium text-[#003c8f] mb-2">Budget</label>
            <input type="number" name="budget" id="budget" wire:model.blur="budget" value="{{old('budget',$projet->budget)}}" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder="Saisir le budget" required />
            @if ($errors->get("budget"))
                @foreach ($errors->get("budget") as $error)
                    <span class="text-red-500 text-sm">{{ $error }}</span>
                @endforeach
            @endif
        </div>

        <!-- Sélectionner des ouvriers -->
        <div>
            <label for="ouvriers" class="block text-sm font-medium text-[#003c8f] mb-2">Sélectionner des ouvriers</label>
            <div wire:ignore>
                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-gray-700 border border-gray-300 rounded-lg hover:text-white hover:bg-[#003c8f] focus:ring-4 focus:outline-none focus:ring-[#003c8f] me-2 mb-2" type="button">
                    Ajouter des ouvriers
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60">
                    <div class="p-3">
                        <label for="input-group-search" class="sr-only">Ajouter des ouvriers</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="input-group-search" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full pl-10 p-2.5" placeholder="Chercher un ouvrier">
                        </div>
                    </div>
                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700" aria-labelledby="dropdownSearchButton">
                        @foreach($ouvriersListes as $ouvrier)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="checkbox-item-{{ $ouvrier->id }}" type="checkbox" wire:model="ouvriers" value="{{ $ouvrier->id }}" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="checkbox-item-{{ $ouvrier->id }}" class="ml-2 text-sm font-medium text-gray-900">{{ $ouvrier->nomcomplet }}</label>
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

        <!-- Statut -->
        <div class="w-full mb-5 group flex flex-row">
            <label for="statut" class="block w-1/4 mb-2 text-sm font-medium text-[#003c8f]">Statut</label>
            <div class="w-1/4">
                <input type="radio" id="initial" name="statut" wire:model="statut" value="initial" class="text-[#003c8f] focus:ring-[#003c8f]">
                <label for="initial" class="text-sm font-medium text-gray-900">Initial</label>
            </div>
            <div class="w-1/4">
                <input type="radio" id="en_cours" name="statut" wire:model="statut" value="en_cours" class="text-[#003c8f] focus:ring-[#003c8f]">
                <label for="en_cours" class="text-sm font-medium text-gray-900">En cours</label>
            </div>
            <div class="w-1/4">
                <input type="radio" id="termine" name="statut" wire:model="statut" value="termine" class="text-[#003c8f] focus:ring-[#003c8f]">
                <label for="termine" class="text-sm font-medium text-gray-900">Terminé</label>
            </div>
            @if ($errors->get("statut"))
                @foreach ($errors->get("statut") as $error)
                    <span class="text-red-500 text-sm">{{ $error }}</span>
                @endforeach
            @endif
        </div>

        <!-- Dates -->
        <div class="flex space-x-6">
            <!-- Date de début -->
            <div class="flex-1">
                <label for="dateDeDebut" class="block text-sm font-medium text-[#003c8f] mb-2">Date de début</label>
                <input type="date" name="dateDeDebut" id="dateDeDebut" wire:model="dateDeDebut" value="{{old('dateDeDebut',$projet->dateDeDebut)}}" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" required />
                @if ($errors->get("dateDeDebut"))
                    @foreach ($errors->get("dateDeDebut") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            <!-- Date de fin -->
            <div class="flex-1">
                <label for="dateDeFin" class="block text-sm font-medium text-[#003c8f] mb-2">Date de fin</label>
                <input type="date" name="dateDeFin" id="dateDeFin" wire:model="dateDeFin" value="{{old('dateDeFin',$projet->dateDeFin)}}" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" required />
                @if ($errors->get("dateDeFin"))
                    @foreach ($errors->get("dateDeFin") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-[#003c8f] mb-2">Description</label>
            <textarea id="description" wire:model="description" rows="4" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder="Saisir la description...">{{ old('description', $projet->description) }}</textarea>
            @if ($errors->get("description"))
                @foreach ($errors->get("description") as $error)
                    <span class="text-red-500 text-sm">{{ $error }}</span>
                @endforeach
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-[#003c8f] border border-[#003c8f] rounded-lg hover:bg-[#003c8f] focus:ring-4 focus:outline-none focus:ring-[#003c8f]">
                Modifier
            </button>
        </div>
    </form>
</div>
