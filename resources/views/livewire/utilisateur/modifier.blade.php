<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <style>
        body {
            background-color: #071720;
            font-family: 'Arial', sans-serif;
            color: #FFFFFF;
        }
        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
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
            color: #071720;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #071720;
        }
        .form-group input:focus {
            border-color: #38B5FF;
            outline: none;
            box-shadow: 0 0 5px rgba(56, 181, 255, 0.5);
        }
        .form-group span {
            color: #FF0000;
            font-size: 12px;
        }
        .submit-button {
            background-color: #38A169; /* Vert */
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
            background-color: #2F855A; /* Teinte de vert plus foncée */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="form-title">Modifier Utilisateur</h2>

        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="updateUser" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" wire:model="prenom" required>
                @error('prenom') <span>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" wire:model="nom" required>
                @error('nom') <span>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" wire:model="email" required>
                @error('email') <span>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe (laissez vide si pas de changement)</label>
                <input type="password" id="password" wire:model="password">
                @error('password') <span>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation">
            </div>

            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" wire:model="adresse" required>
                @error('adresse') <span>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" wire:model="telephone" required>
                @error('telephone') <span>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="submit-button">Mettre à jour</button>
            </div>
        </form>
    </div>
</body>
</html>