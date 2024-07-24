{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout d'utilisateur</title>
    <style>
        body {
            background-color: #edf4f9;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="max-w-md mx-auto p-8 bg-white rounded-lg shadow-lg mt-19 ml-120">
        <h3 class="text-center text-2xl font-bold text-[#003c8f] mb-6">Formulaire d'ajout d'utilisateur</h3>
        <form class="space-y-6" wire:submit="register">
            <div>
                <label for="prenom" class="block text-sm font-medium text-[#003c8f] mb-1">Prénom</label>
                <input type="text" name="prenom" id="prenom" wire:model="prenom" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("prenom"))
                    @foreach ($errors->get("prenom") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="nom" class="block text-sm font-medium text-[#003c8f] mb-1">Nom</label>
                <input type="text" name="nom" id="nom" wire:model="nom" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("nom"))
                    @foreach ($errors->get("nom") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="underline_select" class="block text-sm font-medium text-[#003c8f] mb-1">Sélectionner un rôle</label>
                <select id="underline_select" wire:model="idRole" required class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5">
                    <option value="" disabled selected>Sélectionner un rôle</option>
                    <option value="2">Chef de projet</option>
                    <option value="3">Ouvrier</option>
                    <option value="4">Client</option>
                </select>
                @if ($errors->get("idRole"))
                    @foreach ($errors->get("idRole") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="floating_email" class="block text-sm font-medium text-[#003c8f] mb-1">Email</label>
                <input type="email" name="floating_email" wire:model="email" id="floating_email" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("email"))
                    @foreach ($errors->get("email") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <input type="submit" value="Envoyer" class="w-full text-white bg-[#003c8f] hover:bg-[#002f6c] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            </div>
        </form>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout d'utilisateur</title>
    <style>
        body {
            background-color: #edf4f9;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="max-w-md mx-auto p-8 bg-white rounded-lg shadow-lg mt-19 ml-120">
        <h3 class="text-center text-2xl font-bold text-[#003c8f] mb-6">Formulaire d'ajout d'utilisateur</h3>
        <form class="space-y-6" wire:submit="register">
            <div>
                <label for="prenom" class="block text-sm font-medium text-[#003c8f] mb-1">Prénom</label>
                <input type="text" name="prenom" id="prenom" wire:model="prenom" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("prenom"))
                    @foreach ($errors->get("prenom") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="nom" class="block text-sm font-medium text-[#003c8f] mb-1">Nom</label>
                <input type="text" name="nom" id="nom" wire:model="nom" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("nom"))
                    @foreach ($errors->get("nom") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="underline_select" class="block text-sm font-medium text-[#003c8f] mb-1">Sélectionner un rôle</label>
                <select id="underline_select" wire:model="idRole" required class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5">
                    <option value="" disabled selected>Sélectionner un rôle</option>
                    <option value="2">Chef de projet</option>
                    <option value="3">Ouvrier</option>
                    <option value="4">Client</option>
                </select>
                @if ($errors->get("idRole"))
                    @foreach ($errors->get("idRole") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="floating_email" class="block text-sm font-medium text-[#003c8f] mb-1">Email</label>
                <input type="email" name="floating_email" wire:model="email" id="floating_email" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("email"))
                    @foreach ($errors->get("email") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="adresse" class="block text-sm font-medium text-[#003c8f] mb-1">Adresse</label>
                <input type="text" name="adresse" id="adresse" wire:model="adresse" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("adresse"))
                    @foreach ($errors->get("adresse") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <label for="telephone" class="block text-sm font-medium text-[#003c8f] mb-1">Téléphone</label>
                <input type="text" name="telephone" id="telephone" wire:model="telephone" class="bg-[#f7f9fc] border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#003c8f] focus:border-[#003c8f] block w-full p-2.5" placeholder=" " required />
                @if ($errors->get("telephone"))
                    @foreach ($errors->get("telephone") as $error)
                        <span class="text-red-500 text-sm">{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div>
                <input type="submit" value="Envoyer" class="w-full text-white bg-[#003c8f] hover:bg-[#002f6c] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            </div>
        </form>
    </div>
</body>
</html>
