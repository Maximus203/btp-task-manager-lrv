<div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form class="max-w-md mx-auto mt-40 space-y-6" wire:submit.prevent="login">
        @if (session()->has('error'))
            <div class="text-red-500 text-sm mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div>
            <div class="flex items-center">
                <label for="floating_email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
            </div>
            <input wire:model="email" type="email" name="floating_email" id="floating_email" class="block w-full py-2.5 px-4 mt-1 text-sm text-gray-900 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <div class="flex items-center">
                <label for="floating_password" class="block text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
            </div>
            <input wire:model="password" type="password" name="floating_password" id="floating_password" class="block w-full py-2.5 px-4 mt-1 text-sm text-gray-900 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="remember" id="remember" type="checkbox" class="rounded text-blue-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenir de moi') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-700 hover:underline dark:text-blue-400" href="{{ route('password.request') }}" wire:navigate>{{ __('Mot de passe oublié?') }}</a>
            @endif
        </div>

        <div class="mt-4">
            <button type="submit" class="w-full py-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-white dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('Se connecter') }}
            </button>
        </div>
    </form>
</div>
