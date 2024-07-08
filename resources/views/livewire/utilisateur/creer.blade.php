<div>
    <form class="max-w-md mx-auto mt-6" wire:submit="register">
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="w-full mb-5">
                <x-input type="text" wire:model.blur="prenom" label="Prénom" required placeholder=" "  />
            </div>
            <div class="w-full mb-5">
                <x-input type="text" wire:model.blur="nom" label="Nom" required placeholder=" " />
            </div>
        </div>
        <div class="w-full mb-5">
            <label for="idRole" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionner un rôle</label>
            <select wire:model.blur="idRole" id="idRole" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choisir un rôle</option>
                @foreach($roles as $role)
                    <option value="{{ $role->idRole }}">{{ $role->nomRole }}</option>
                @endforeach
            </select>
            @error('idRole') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="w-full mb-5">
            <x-input type="email" wire:model.blur="email" label="Email" required placeholder=" " />
        </div>
        <div class="w-full mb-5">
            <x-button type="submit" label="Envoyer" right-icon="check" outline interaction="primary" />
        </div>
    </form>
</div>
