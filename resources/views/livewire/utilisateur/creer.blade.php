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
            color: #071720;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #071720;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #071720;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #071720;
            background-color: #f7f9fc;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color: #38B5FF;
            outline: none;
            box-shadow: 0 0 5px rgba(56, 181, 255, 0.5);
        }
        .form-group span {
            color: #FF0000;
            font-size: 12px;
        }
        .submit-button {
            background-color: #38A169;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-button:hover {
            background-color: #38A169;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="form-title">Formulaire d'ajout d'utilisateur</h3>
        <form class="space-y-6" wire:submit.prevent="register">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" wire:model="prenom" placeholder=" " required />
                @if ($errors->get("prenom"))
                    @foreach ($errors->get("prenom") as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" wire:model="nom" placeholder=" " required />
                @if ($errors->get("nom"))
                    @foreach ($errors->get("nom") as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="underline_select">Sélectionner un rôle</label>
                <select id="underline_select" wire:model="idRole" required>
                    <option value="" disabled selected>Sélectionner un rôle</option>
                    <option value="2">Chef de projet</option>
                    <option value="3">Ouvrier</option>
                    <option value="4">Client</option>
                </select>
                @if ($errors->get("idRole"))
                    @foreach ($errors->get("idRole") as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="floating_email">Email</label>
                <input type="email" name="floating_email" id="floating_email" wire:model="email" placeholder=" " required />
                @if ($errors->get("email"))
                    @foreach ($errors->get("email") as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" wire:model="adresse" placeholder=" " required />
                @if ($errors->get("adresse"))
                    @foreach ($errors->get("adresse") as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" wire:model="telephone" placeholder=" " required />
                @if ($errors->get("telephone"))
                    @foreach ($errors->get("telephone") as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Envoyer</button>
            </div>
        </form>
    </div>
</body>
</html>