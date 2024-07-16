<div class="bg-gray-100 min-h-screen flex items-center justify-center" style="background-color: #B0C4DE;">

    <div class="bg-white bg-opacity-20 p-8 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-center mb-6">
            <img src="images/casque.jpg" alt="Logo de l'entreprise" class="h-12 rounded-full">
        </div>
        <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

        <form wire:submit.prevent="login" >
            @if (session()->has('error'))
                <div class="text-red-500 text-sm mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div>

                <div class="flex items-center mb-1">
                    <label for="floating_email" class="block text-sm font-medium text-white">Email</label>
                    <img src="images/email.png" alt="Icone email" class="ml-2 h-5">
                </div>
                <input wire:model="email" type="email" name="floating_email" id="floating_email" class="block w-full py-2.5 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder=" " required />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <div class="flex items-center mb-1">
                    <label for="floating_password" class="block text-sm font-medium text-white">Mot de passe</label>
                    <img src="images/mdp.png" alt="Icone mot de passe" class="ml-2 h-5">
                </div>
                <input wire:model="password" type="password" name="floating_password" id="floating_password" class="block w-full py-2.5 px-4 text-sm text-black bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder=" " required />
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="remember" id="remember" type="checkbox" class="rounded text-blue-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-white">Se souvenir de moi</span>
                </label>

                @if (Route::has('password.request'))
                    <a  class="text-sm hover:underline" href="{{ route('password.request') }}" wire:navigate style="color: white; hover:text-[#1E90FF]">Mot de passe oublié?</a>
                @endif
            </div>

            <div class="mt-6">
                <button type="submit" style="background-color: #1E90FF; color: white; width: 100%; padding: 0.625rem 1rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 500; hover:bg-blue-800; focus:ring-4 focus:outline-none focus:ring-blue-300" class="transition duration-150 ease-in-out">
    Se connecter
</button>

            </div>
        </form>
    </div>
</div>
