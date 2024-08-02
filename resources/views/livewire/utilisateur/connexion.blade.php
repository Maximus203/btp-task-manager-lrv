<div class="bg-[#f7f9fc] min-h-screen flex items-center justify-center" style="background-color: #edf4f9;">

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full border border-gray-300" style="background-color: #ffffff;">
        <div class="flex justify-center mb-6">
            <!-- Augmentation de la taille du logo -->
            <img src="images/logo.jpeg" alt="Logo de l'entreprise" class="h-20 w-38 rounded-full">
        </div>
        
        <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

        <form wire:submit.prevent="login" class="space-y-6">
            @if (session()->has('error'))
                <div class="text-red-500 text-sm mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="relative mb-4">
                <label for="floating_email" class="block text-sm font-medium text-[#071720] mb-1">Email</label>
                <div class="flex items-center">
                    <img src="images/email.png" style="filter: invert(100%); color: #071720" alt="Icone email" class="h-6 w-6 absolute left-3">
                    <input wire:model="email" type="email" name="floating_email" id="floating_email" class="block w-full py-3 pl-10 pr-4 text-sm text-gray-700 bg-[#edf4f9] border border-gray-100 rounded-lg focus:ring-[#071720] focus:border-[#071720]" placeholder=" " required />
                </div>
            </div>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <div class="relative mb-4">
                <label for="floating_password" class="block text-sm font-medium text-[#071720] mb-1">Mot de passe</label>
                <div class="flex items-center">
                    <img src="images/mdp.png" style="filter: invert(100%); color: #071720" alt="Icone mot de passe" class="h-6 w-6 absolute left-3">
                    <input wire:model="password" type="password" name="floating_password" id="floating_password" class="block w-full py-3 pl-10 pr-4 text-sm text-gray-700 bg-[#edf4f9] border border-gray-300 rounded-lg focus:ring-[#071720] focus:border-[#071720]" placeholder=" " required />
                </div>
            </div>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <div class="flex items-center justify-between mb-4">
                <label for="remember" class="inline-flex items-center text-[#071720]">
                    <input wire:model="remember" id="remember" style=" color: #071720" type="checkbox" class="rounded text-blue-100 shadow-sm focus:ring-[#071720]" name="remember">
                    <span class="ml-2 text-sm">Se souvenir de moi</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm hover:underline text-[#071720]" href="{{ route('password.request') }}" wire:navigate>Mot de passe oublié?</a>
                @endif
            </div>

            <div>
                <button type="submit" class="bg-[#071720] text-white w-full py-2.5 rounded-lg font-medium text-sm transition duration-300 ease-in-out hover:bg-[#071720] focus:ring-4 focus:outline-none focus:ring-[#071720]/50" style="background-color: #071720; color: white; width: 100%; padding: 0.625rem 1rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 500;">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>