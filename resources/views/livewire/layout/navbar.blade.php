
<div class="relative">
    @auth
        <!-- Navbar Horizontale -->
        <nav class="bg-[#38B5FF] border-[#38B5FF] fixed top-0 left-0 w-full z-30 shadow-md">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <a wire:click="logout" class="flex items-center space-x-3 rtl:space-x-reverse group cursor-pointer">
                        <img src="{{ asset('images/hk.png') }}" class="h-8 rounded-full" alt="Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white group-hover:text-[#edf4f9] transition duration-300">HAWEL KEBE</span>
                    </a>
                </div>
                <div class="flex items-center space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
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
            </div>
        </nav>

        <!-- Barre Latérale Verticale -->
        <aside style="width: 15%" class="fixed top-16 left-0 h-full w-64 bg-gray-800 text-white z-20">
            <div class="flex flex-col h-full">
                <div class="flex flex-col items-start p-4 space-y-4">
                    @if (Auth::user()->idRole == 4)
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-[#38B5FF] {{ (request()->route()->getName() == 'dashboard') ? 'bg-[#38B5FF]' : '' }}">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    @elseif (Auth::user()->idRole == 3)
                        <a href="{{ route('lister-tache') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-[#38B5FF] {{ (request()->route()->getName() == 'lister-tache') ? 'bg-[#38B5FF]' : '' }}">
                            <img src="{{ asset('images/tache.png') }}" class="h-6 mr-2" alt=""> Taches
                        </a>
                    @else
                        <a href="{{ route('lister-projet') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-[#38B5FF] {{ (request()->route()->getName() == 'lister-projet') ? 'bg-[#38B5FF]' : '' }}">
                            <img src="{{ asset('images/projet.png') }}" class="h-6 mr-2" alt=""> Projets
                        </a>
                        <a href="{{ route('lister-tache') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-[#38B5FF] {{ (request()->route()->getName() == 'lister-tache') ? 'bg-[#38B5FF]' : '' }}">
                            <img src="{{ asset('images/tache.png') }}" class="h-6 mr-2" alt=""> Taches
                        </a>
                        @if (Auth::user()->idRole == 1 || Auth::user()->idRole == 2)
                            <a href="{{ route('lister-utilisateur') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-[#38B5FF] {{ (request()->route()->getName() == 'lister-utilisateur') ? 'bg-[#38B5FF]' : '' }}">
                                <i class="fas fa-user mr-2"></i> Utilisateur
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </aside>
        
        
        
        <!-- Contenu Principal -->
        <main class="pt-16 pl-64">
            <!-- Votre contenu principal ici -->
            @yield('content')
        </main>
    @else
        @if (!request()->routeIs('login'))
        <nav class="bg-white border-blue-400 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-1"> 
                <a href="#" class="flex items-center space-x-1 rtl:space-x-reverse">
                    <img src="images/logo.jpeg" class="h-12" alt="Flowbite Logo" /> 
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Hawel Kebe</span> 
                </a>
                <div class="flex items-center space-x-2 rtl:space-x-reverse"> 
                    <a href="tel:5541251234" class="text-xs text-gray-500 dark:text-white hover:underline">(+221) 78-868-67-85</a> 
                    <a href="{{ route('login') }}" class="text-l text-black dark:text-blue-500 hover:underline bg-[#1da1f2] hover:bg-[#1a91da] px-2 py-1 rounded-full font-medium">Connexion</a> 
                </div>
            </div>
        </nav>

        <nav class="bg-gray-100 dark:bg-blue-500">
            <div class="max-w-screen-xl px-4 py-3 mx-auto">
                <div class="flex items-center">
                    <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                        <li>
                            <a href="#accueil" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">Accueil</a>
                        </li>
                        <li>
                            <a href="#about-us" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">A propos de nous</a>
                        </li>
                        <li>
                            <a href="#services" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">Services</a>
                        </li>
                        <li>
                            <a href="#contact" class="text-gray-900 dark:text-white hover:underline px-3 py-2 rounded-lg">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endif
    @endauth
</div>