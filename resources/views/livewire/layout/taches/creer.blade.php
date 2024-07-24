<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout de tâche</title>
    <style>
        body {
            background-color: #edf4f9;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
        <h3 class="text-center text-2xl font-bold text-[#003c8f] mb-6">Formulaire d'ajout de tâche</h3>
        <form class="space-y-6" wire:submit.prevent="submit">

            <div>
                <label for="nomTache" class="block text-sm font-medium text-[#003c8f] mb-1">Nom de la Tâche</label>
                <input type="text" name="nomTache" id="nomTache" wire:model.blur="nomTache" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder="Saisir le nom de la tâche" required />
                @error('nomTache') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="idProjet" class="block text-sm font-medium text-[#003c8f] mb-1">Projet</label>
                <select id="idProjet" wire:model="idProjet" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5">
                    <option value="" disabled>Sélectionner un projet</option>
                    @foreach($projets as $projet)
                        <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                    @endforeach
                </select>
                @error('idProjet') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="ouvrier" class="block text-sm font-medium text-[#003c8f] mb-1">Sélectionner un ouvrier</label>
                <select id="ouvrier" wire:model="ouvrier" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5">
                    <option value="" disabled>Choisir un ouvrier</option>
                    @foreach($ouvriers as $ouvrier)
                        <option value="{{ $ouvrier->id }}">{{ $ouvrier->nomcomplet }}</option>
                    @endforeach
                </select>
                @error('ouvrier') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-[#003c8f] mb-1">Description</label>
                <input type="text" name="description" id="description" wire:model.blur="description" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder="Description" required />
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="budget" class="block text-sm font-medium text-[#003c8f] mb-1">Budget</label>
                <input type="number" name="budget" id="budget" wire:model.blur="budget" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder="Budget" required />
                @error('budget') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Statut -->
            <div class="w-full mb-5 group flex flex-row">
                <label for="statut" class="block text-sm font-medium text-[#003c8f] mb-1">Statut</label>
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
                <label for="dateDeDebut" class="block text-sm font-medium text-[#003c8f] mb-1">Date de Début</label>
                <input wire:model="dateDeDebut" type="date" name="dateDeDebut" id="dateDeDebut" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" required />
                @error('dateDeDebut') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <br>
                <label for="dateDeFin" class="block text-sm font-medium text-[#003c8f] mb-1">Date de Fin</label>
                <input wire:model="dateDeFin" type="date" name="dateDeFin" id="dateDeFin" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" required />
                @error('dateDeFin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full text-white bg-[#003c8f] hover:bg-[#002f6c] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Créer la tâche</button>
        </form>
    </div>
</body>
</html>
