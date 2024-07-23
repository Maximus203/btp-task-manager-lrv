<div class="max-w-sm mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
    <b><i><h3 style="text-align: center">Formulaire d'ajout d'utilisateur</h3></i></b>

    <form class="space-y-6" wire:submit="register">
        <div>
            <div class="flex items-center">
              
                <label for="prenom" class="block text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
            </div>
            <input type="text" name="prenom" id="prenom" wire:model="prenom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            @if ($errors->get("prenom"))
              @foreach ($errors->get("prenom") as $error)
                    <span class="text-red-500 text-sm">{{$error}}</span>
              @endforeach
            @endif
        </div>
        <div>
            <div class="flex items-center">
              
                <label for="nom" class="block text-sm font-medium text-gray-900 dark:text-white">Nom</label>
            </div>
            <input type="text" name="nom" id="nom" wire:model="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            @if ($errors->get("nom"))
                @foreach ($errors->get("nom") as $error)
                      <span class="text-red-500 text-sm">{{$error}}</span>
                @endforeach
              @endif
        </div>
        <div>
            <div class="flex items-center">
              
                <label for="underline_select" class="block text-sm font-medium text-gray-900 dark:text-white">Sélectionner un role</label>
            </div>
            <select id="underline_select" wire:model="idRole" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Sélectionner un role</option>
                <option value="2">Chef de projet</option>
                <option value="3">Ouvrier</option>
                <option value="4">Client</option>
            </select>
            @if ($errors->get("idRole"))
            @foreach ($errors->get("idRole") as $error)
                  <span class="text-red-500 text-sm">{{$error}}</span>
            @endforeach
          @endif
        </div>
        <div>
            <div class="flex items-center">
               
                <label for="floating_email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
            </div>
            <input type="email" name="floating_email" wire:model="email" id="floating_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            @if ($errors->get("email"))
            @foreach ($errors->get("email") as $error)
                  <span class="text-red-500 text-sm">{{$error}}</span>
            @endforeach
          @endif
        </div>
        <div>
            <input type="submit" value="Envoyer" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </div>
    </form>
    <div class="mt-6 text-center">
<a href="{{ route('lister-utilisateur') }}" class="text-blue-700 hover:no-underline dark:text-blue-400">Voir la liste des utilisateurs</a>
</div>
</div>
