<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue {{ config('app.name') }}</title>
</head>
<body>
    <h1 class="text-4xl font-medium">Welcome, {{ $username }}</h1>
   <h3> Bienvenue sur notre application.</h3>
    <p>Nous sommes ravis de vous compter parmi les nôtres. Votre email est {{ $email }}.</p>
    <p>Votre mot de passe est: {{ $password }}. Merci de le changer à la première connexion.</p>
    <br>
    <a href="{{ route('login') }}">Connectez-vous</a>
</body>
</html>
