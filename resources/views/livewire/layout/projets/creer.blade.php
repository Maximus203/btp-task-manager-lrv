<div>
    <form class="max-w-md mx-auto mt-9" wire:submit.prevent="submit">
        <div class="w-full mb-5 group">
            <x-input wire:model.blur="nomProjet" label="Nom du Projet" required placeholder="Codou Diouf" />
        </div>

        <div class="w-full mb-5 group">
            <x-select wire:model="client" label="Sélectionner un client" placeholder="Client" :options="$clients"
                option-label="nomcomplet" option-value="id" required />
        </div>

        <div class="w-full mb-5 group">
            <x-select wire:model="client" label="Sélectionner un chef de projet" placeholder="Chef de projet"
                :options="$chefProjets" option-label="nomcomplet" option-value="id" required />
        </div>


        <div class="w-full mb-5 group">
            <x-select wire:model="client" label="Sélectionner des ouvriers" placeholder="Ouvriers" :options="$ouvriersListes"
                multiselect option-label="nomcomplet" option-value="id" required />
        </div>

        <div class="w-full mb-5 group">
            <div class="w-full mb-5 group">
                <x-input wire:model.blur="budget" label="Budget" required placeholder="1200000" />
            </div>
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
            <x-button label="Ajouter" right-icon="check" outline interaction:solid="primary" />
        </div>
    </form>
</div>
