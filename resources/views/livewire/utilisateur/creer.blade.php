
<div>
    
    <form class="max-w-md mx-auto mt-6"  wire:submit="register" >
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="prenom" id="prenom" wire:model="prenom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="prenom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
            @if ($errors->get("prenom"))
              @foreach ($errors->get("prenom") as $error)
                 
                    <span class="text-red-500 text-sm">{{$error}}</span>
                 
              @endforeach  
            @endif
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nom" id="nom" wire:model="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="nom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
                @if ($errors->get("nom"))
                @foreach ($errors->get("nom") as $error)
                      <span class="text-red-500 text-sm">{{$error}}</span>
                @endforeach  
              @endif
            </div>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <label for="underline_select" class="sr-only">Underline select</label>
            
            <select id="underline_select" wire:model="idRole"  required  class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Sélectionner un role</option>
                {{-- <option value="0">Directeur</option> --}}
                <option value="1">Chef de projet</option>
                <option value="2">Ouvrier</option>
                <option value="3">Client</option>
            </select>
            @if ($errors->get("idRole"))
            @foreach ($errors->get("idRole") as $error)
                  <span class="text-red-500 text-sm">{{$error}}</span>
            @endforeach  
          @endif
          </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="floating_email"  wire:model="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email </label>
            @if ($errors->get("email"))
            @foreach ($errors->get("email") as $error)
                  <span class="text-red-500 text-sm">{{$error}}</span>
            @endforeach  
          @endif
        </div>
        {{-- <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="password" wire:model="password"id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot de passe</label>
            @if ($errors->get("password"))
            @foreach ($errors->get("password") as $error)
                  <span class="text-red-500 text-sm">{{$error}}</span>
            @endforeach  
          @endif
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="password_confirmation" wire:model="password_confirmation" id="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmer le mot de passe</label>
            @if ($errors->get("password_confirmation"))
            @foreach ($errors->get("password_confirmation") as $error)
                  <span class="text-red-500 text-sm">{{$error}}</span>
            @endforeach  
          @endif
        </div> --}}
        
       
        <input type="submit" value="Envoyer" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      </form>
</div>
