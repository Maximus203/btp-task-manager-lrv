{{-- <div>
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

            </div>
        </nav>
        
        @endif
    @endauth
</div> --}}







{{-- 
<div>
    @auth
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">

        <div class="px-3 py-3 lg:px-5 lg:pl-3">
          <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
              <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
              </button>
              <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                <img src="images/logo.jpeg" class="h-12 me-3" alt="FlowBite Logo" />
                <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">HAWEL KEBE</span>
              </a>
            </div>
            <div class="flex items-center">
              <div class="flex items-center ms-3">
                <div>
                  <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                  </button>
                </div>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                  <div class="px-4 py-3" role="none">
                    <a href="{{ route('profile') }}" class="block text-sm text-gray-900 dark:text-white">{{ __(Auth::user()->prenom . ' ' . Auth::user()->nom) }}</a>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                  </div>
                  <ul class="py-1" role="none">
                    <li>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                    </li>
                    <li>
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                    </li>
                    <li>
                      <a wire:click="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      
      <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
          <ul class="space-y-2 font-medium">
            @if (Auth::user()->idRole == 4)
            <li>
              <a href="dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
              </a>
            </li>
            @elseif (Auth::user()->idRole == 3)
            <li>
              <a href="bas-tache" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">BAS Tâche</span>
              </a>
            </li>
            @elseif (Auth::user()->idRole == 2 || Auth::user()->idRole == 1)
            <li>
              <a href="{{ route('lister-projet') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Projets</span>
              </a>
            </li>
            <li>
              <a href="{{ route('lister-tache') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Tâches</span>
              </a>
            </li>
            @endif
      
            @if (Auth::user()->idRole == 2 || Auth::user()->idRole == 1)
            <li>
              <a href="register" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 4a2 2 0 0 0-2 2 2 2 0 0 0 4 0 2 2 0 0 0-2-2Zm0 2a1 1 0 0 1-1-1 1 1 0 0 1 2 0 1 1 0 0 1-1 1Zm3.874 6.47a4.992 4.992 0 0 0-2.54-.63c-1.512 0-2.946.392-4.13 1.088a.75.75 0 0 0-.185 1.055C8.678 13.431 9.928 14 11.25 14h2.5c1.322 0 2.572-.569 3.242-1.47a.75.75 0 0 0-.183-1.05Zm-3.742 2.28c-.766 0-1.485-.175-2.123-.475a5.4 5.4 0 0 1-.608-1.08c.26.075.521.11.78.11h2.5c.259 0 .52-.035.779-.11a5.404 5.404 0 0 1-.608 1.08c-.638.3-1.357.475-2.124.475Zm-1.874-6.47a.5.5 0 1 0-.5-.5.5.5 0 0 0 .5.5Zm0-1a1.5 1.5 0 1 1 1.5 1.5A1.5 1.5 0 0 1 10 7Zm8-2H16v12h2V5Zm-4 0H8v12h6V5Zm-4 0H4v12h4V5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Utilisateurs</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </aside>
     
    @else
        @if (!request()->routeIs('login'))
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

            </div>
        </nav>
        
        @endif
    @endauth


    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
</div> --}}

<div class="relative">
    @auth
        <!-- Navbar Horizontale -->
        <nav class="bg-[#9ecaea] border-[#b4d8f2] fixed top-0 left-0 w-full z-30 shadow-md">
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
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-teal-700">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    @elseif (Auth::user()->idRole == 3)
                        <a href="{{ route('lister-tache') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-teal-700">
                            <img src="{{ asset('images/tache.png') }}" class="h-6 mr-2" alt=""> Taches
                        </a>
                    @else
                        <a href="{{ route('lister-projet') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-teal-700">
                            <img src="{{ asset('images/projet.png') }}" class="h-6 mr-2" alt=""> Projets
                        </a>
                        <a href="{{ route('lister-tache') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-teal-700">
                            <img src="{{ asset('images/tache.png') }}" class="h-6 mr-2" alt=""> Taches
                        </a>
                        @if (Auth::user()->idRole == 1 || Auth::user()->idRole == 2)
                            <a href="{{ route('lister-utilisateur') }}" class="flex items-center space-x-2 px-4 py-2 text-white rounded hover:bg-teal-700">
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