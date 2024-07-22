<div>
    @auth
        <nav class="bg-teal-500 border-teal-600 dark:bg-gray-900">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
                <a  wire:click="logout" class="flex items-center space-x-3 rtl:space-x-reverse group">
                    <img src="{{ asset('images/hk.png') }}" class="h-8 rounded-full" alt="Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white group-hover:text-teal-300 transition duration-300">HAWEL KEBE</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="{{ asset('images/user.png') }}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                        <div class="px-4 py-3">
                            <a href="{{ route('profile') }}" class="block text-sm text-gray-900 dark:text-white">{{ __(Auth::user()->prenom . ' ' . Auth::user()->nom) }}</a>
                            <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            @if (Auth::user()->idRole == 4)
                                <li>
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                </li>
                            @elseif (Auth::user()->idRole == 3)
                                <li>
                                    <a href="{{ route('lister-tache') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Taches</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('lister-projet') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Projets</a>
                                </li>
                                <li>
                                    <a href="{{ route('lister-tache') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Taches</a>
                                </li>
                                @if (Auth::user()->idRole == 1 || Auth::user()->idRole == 2)
                                    <li>
                                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ajouter Utilisateur</a>
                                    </li>
                                @endif
                            @endif
                            <li>
                                <a wire:click="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer">
                                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-teal-500 dark:bg-gray-800 md:dark:bg-teal-500 dark:border-gray-700">
                        @if (Auth::user()->idRole == 4)
                            <li>
                                <a href="{{ route('dashboard') }}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <img src="{{ asset('images/dashboard.png') }}" alt="" class="h-5 inline-block align-middle mr-2"> Dashboard</a>
                            </li>
                        @elseif (Auth::user()->idRole == 3)
                            <li>
                                <a href="{{ route('lister-tache') }}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <img src="{{ asset('images/tache.png') }}" class="h-5 inline-block align-middle mr-2 pb-1" alt=""> Taches</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('lister-projet') }}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <img src="{{ asset('images/projet.png') }}" class="h-5 inline-block align-middle mr-2 pb-0.5" alt=""> Projets</a>
                            </li>
                            <li>
                                <a href="{{ route('lister-tache') }}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <img src="{{ asset('images/tache.png') }}" class="h-5 inline-block align-middle mr-2 pb-1" alt=""> Taches</a>
                            </li>
                            @if (Auth::user()->idRole == 1 || Auth::user()->idRole == 2)
                                <li>
                                    <a href="{{ route('register') }}" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        <i class="fas fa-user"></i> Ajouter Utilisateur
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @else
        @if (!request()->routeIs('login'))
<<<<<<< HEAD
        <nav class="bg-white border-teal-600 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="images/logo.jpeg" class="h-20" alt="Flowbite Logo" /> <!-- Augmentation de la taille du logo -->
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Hawel Kebe</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="tel:5541251234" class="text-sm text-gray-500 dark:text-white hover:underline">(+221) 78-868-67-85</a>
                    <a href="{{ route('login') }}" class="text-sm text-black dark:text-blue-500 hover:underline bg-[#1da1f2] hover:bg-[#1a91da] px-4 py-2 rounded-full font-medium">Connexion</a> <!-- Stylisation du bouton -->
                </div>
            </div>
        </nav>
        <nav class="bg-gray-50 dark:bg-teal-700">
            <div class="max-w-screen-xl px-4 py-3 mx-auto">
                <div class="flex items-center">
                    <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                        <li>
                            <a href="#" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">Accueil</a>
                        </li>
                        <li>
                            <a href="#about-us" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">A propos de nous</a>
                        </li>
                        <li>
                            <a href="#statistics" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">Nos réalisations</a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">Contact</a>
                        </li>
                    </ul>
=======
            <nav class="bg-white border-teal-600 dark:bg-gray-900">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                    <a href="" class="flex items-center space-x-3 rtl:space-x-reverse group">
                        <img src="{{ asset('images/hk.png') }}" class="h-8" alt="Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-black dark:text-white group-hover:text-teal-300 transition duration-300">HAWEL KEBE</span>
                    </a>
                    <div class="flex items-center space-x-6 rtl:space-x-reverse">
                        <a href="tel:5541251234" class="text-sm text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>
                        <a href="{{ route('login') }}" class="text-sm text-black dark:text-blue-500 hover:underline">Connexion</a>
                    </div>
                </div>
            </nav>
            <nav class="bg-gray-50 dark:bg-teal-700">
                <div class="max-w-screen-xl px-4 py-3 mx-auto">
                    <div class="flex items-center">
                        <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">Services</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">About Us</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-900 dark:text-white hover:underline">Contact</a>
                            </li>
                        </ul>
                    </div>
>>>>>>> eca9b093963e46b4b024fa43fdc3fd3a77ccd269
                </div>
            </div>
        </nav>
        
        @endif
    @endauth
</div>
