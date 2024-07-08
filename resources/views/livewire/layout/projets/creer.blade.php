<div class="max-w-sm mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
    <form class="space-y-6" wire:submit.prevent="submit">
        {{-- <div class="w-full mb-5 group">
            <x-input wire:model.blur="nomProjet" label="Nom du Projet" required placeholder="Codou Diouf" />
        </div> --}}
    <div>
        <div class="flex items-center">
            <label for="nomProjet" class="block text-sm font-medium text-gray-900 dark:text-white">Nom du projet</label>
        </div>
            <input type="text" name="nomProjet" id="nomProjet" wire:model.blur="nomProjet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir le nom du projet" required />
            @if ($errors->get("nomProjet"))
              @foreach ($errors->get("nomProjet") as $error)
                 <span class="text-red-500 text-sm">{{$error}}</span>
              @endforeach
            @endif
    </div>

        {{-- <div class="w-full mb-5 group">
            <div class="block mb-2">
                <label for="client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner un client</label>
            </div>
            <select wire:model="client" id="client" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="">Sélectionner un client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nomcomplet }}</option>
                @endforeach
            </select>
        </div> --}}

        <div>
            <div class="flex items-center">
              
                <label for="underline_select" class="block text-sm font-medium text-gray-900 dark:text-white">Sélectionner un role</label>
            </div>
            <select id="underline_select" wire:model="idRole" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Sélectionner un role</option>
                <option value="1">Chef de projet</option>
                <option value="2">Ouvrier</option>
                <option value="3">Client</option>
            </select>
            @if ($errors->get("idRole"))
            @foreach ($errors->get("idRole") as $error)
                  <span class="text-red-500 text-sm">{{$error}}</span>
            @endforeach
          @endif
        </div>


        <div class="w-full mb-5 group">
            <div class="block mb-2">
                <label for="chefProjet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner un chef de projet</label>
            </div>
            <select wire:model="chefProjet" id="chefProjet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="">Sélectionner un chef de projet</option>
                @foreach($chefProjets as $chefProjet)
                    <option value="{{ $chefProjet->id }}">{{ $chefProjet->nomcomplet }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-full mb-5 group">
            <div class="block mb-2">
                <label for="ouvriers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner des ouvriers</label>
            </div>
            <div wire:ignore>
                <select wire:model="ouvriers[]" id="ouvriers" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple required>
                    @foreach($ouvriersListes as $ouvrier)
                        <option value="{{ $ouvrier->id }}">{{ $ouvrier->nomcomplet }}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:click="addOuvrier">Ajouter un ouvrier</button>
        </div>

        {{-- <div class="w-full mb-5 group">
            <x-input wire:model.blur="budget" label="Budget" required placeholder="1200000" />
        </div> --}}
    <div>
        <div class="flex items-center">
            <label for="Budget" class="block text-sm font-medium text-gray-900 dark:text-white">Budget</label>
        </div>
            <input type="numeric" name="Budget" id="Budget" wire:model.blur="budget" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Saisir le budget du projet" required />
            @if ($errors->get("Budget"))
              @foreach ($errors->get("Budget") as $error)
                 <span class="text-red-500 text-sm">{{$error}}</span>
              @endforeach
            @endif
    </div>

        <div class="w-full mb-5 group flex flex-row">
            <label for="statut" class="block w-1/4 mb-2 text-sm font-medium text-gray-500">Status</label>
            <div class="w-1/4">
                <x-radio id="rounded-lg" wire:model="status" rounded="lg" label="Initial" value="initial" xl />
            </div>
            <div class="w-1/4">
                <x-radio id="rounded-lg" wire:model="status" rounded="lg" label="En cours" value="en_cours" xl />
            </div>
            <div class="w-1/4">
                <x-radio id="rounded-lg" wire:model="status" rounded="lg" label="Terminé" value="terminer" xl />
            </div>
        </div>
        <div class="w-full mb-5 group">
            <x-datetime-picker wire:model.live="dateDeDebut" label="Date de début" placeholder="04/07/2024" required />
        </div>

        <div class="w-full mb-5 group">
            <x-datetime-picker wire:model.live="dateDeFin" label="Date de fin" placeholder="27/07/2024" required />
        </div>

        <div class="w-full mb-5 group">
            <x-textarea label="Description" wire:model.blur="description" placeholder="Décrivez le projet" />
        </div>

        <div class="w-full mb-5 group">
            <x-button label="Ajouter" right-icon="check" outline interaction="primary" />
        </div>
        
    </form>
</div>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
