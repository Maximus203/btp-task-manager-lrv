<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de bord</title>
    <!-- Ajoutez vos feuilles de style et scripts ici -->
    <link href="https://unpkg.com/@flowbite/tailwindcss@latest/dist/flowbite.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@flowbite/tailwindcss@latest/dist/flowbite.min.js"></script>
    <style>
        .status-indicator {
            display: inline-block;
            width: 15px; 
            height: 15px; 
            border-radius: 50%;
            margin-right: 8px;
        }
    </style>
</head>
<body class="bg-white min-h-screen">

    <!-- contenu principal -->
    <main class="p-4">
        <div class="flex bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Partie 1/4 : Profil et Tâches -->
            <div class="w-1/4 bg-gray-100 p-4">
                <!-- Profil de l'utilisateur -->
                <div class="mb-4 text-center">
                    <img src="images/user.png" alt="Profile Picture" class="w-20 h-20 rounded-full mx-auto mb-2">
                    <h2 class="text-xl font-semibold">
                        <a href="{{ route('profile') }}" class="text-gray-900 dark:text-white">{{ __(Auth::user()->prenom . ' ' . Auth::user()->nom) }}</a>
                    </h2>
                    <p class="text-gray-500">{{ Auth::user()->email }}</p>
                </div>
                <!-- Nom du projet -->
                <h3 class="text-xl font-bold mb-2 text-center">{{ $taches->first()->projet->nomProjet }}</h3>
                <!-- Liste des tâches -->
                <div>
                    @php
                        $prixTotalInitial = 0;
                        $prixTotalRestant = 0;
                        $labels = [];
                        $data = [];
                        $progressionTotale = 0;
                    @endphp
                    @foreach ($taches as $tache)
                        @php
                            $prixTotalInitial += $tache->budget;
                            if ($tache->statut !== 'terminer') {
                                $prixTotalRestant += $tache->budget;
                            }

                            // Construction des données pour le graphique
                            $labels[] = $tache->nomTache;
                            if ($tache->statut === 'terminer') {
                                $data[] = 100;
                                $progressionTotale += 100;
                            } elseif ($tache->statut === 'en_cours') {
                                $data[] = 50;
                                $progressionTotale += 50;
                            } else {
                                $data[] = 0;
                            }
                        @endphp
                        <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-lg font-semibold">{{ $tache->nomTache }}</h4>
                            </div>
                            <p class="text-gray-600 mb-2">Budget: {{ $tache->budget }}</p>
                            <p class="text-gray-600 mb-2">Description: {{ $tache->description }}</p>
                            <p class="text-gray-600 flex items-center"> <!-- Ajout de flex et items-center pour aligner le statut et le point -->
                                <span class="status-indicator
                                    @if ($tache->statut === 'initial') bg-green-400
                                    @elseif ($tache->statut === 'en_cours') bg-orange-400
                                    @elseif ($tache->statut === 'terminer') bg-red-600
                                    @else bg-gray-400
                                    @endif"></span> 
                                Statut: 
                                @if ($tache->statut === 'initial')
                                    Initial
                                @elseif ($tache->statut === 'en_cours')
                                    En cours
                                @elseif ($tache->statut === 'terminer')
                                    Terminé
                                @else
                                    Autre
                                @endif
                            </p>
                        </div>
                    @endforeach
                    @php
                        $progressionTotale = $progressionTotale / count($taches); // Moyenne de la progression
                    @endphp
                </div>
                <!-- Affichage du prix total initial et restant -->
                <div class="mt-4">
                    <h3 class="text-xl font-bold mb-2">Prix Total des Tâches</h3>
                    <p class="text-gray-600">Montant Initial: {{ $prixTotalInitial }}</p>
                    <p class="text-gray-600">Montant Restant: {{ $prixTotalRestant }}</p>
                </div>
            </div>

            <!-- Partie 3/4 : Images et Graphique -->
            <div class="w-3/4 p-4">
                <!-- Image principale -->
                <div class="mb-4">
                    <img src="images/btp.png" alt="Entreprise BTP" class="w-full h-64 object-cover rounded-lg shadow-md">
                </div>
                <!-- Images du projet en construction -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <img src="path_to_image_1" alt="Project Image 1" class="w-full h-48 object-cover rounded-lg shadow-md">
                    <img src="path_to_image_2" alt="Project Image 2" class="w-full h-48 object-cover rounded-lg shadow-md">
                </div>
                <!-- Graphique d'évolution -->
                <div>
                    <h3 class="text-xl font-bold mb-2 text-center">Évolution du projet: {{ $taches->first()->projet->nomProjet }}</h3>
                    <div class="bg-white p-4 rounded-lg shadow-lg" style="width: 100%; max-width: 2000px; margin: 0 auto;">
                        <canvas id="evolutionGraph"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Ajoutez vos scripts de pied de page ici -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ctx = document.getElementById('evolutionGraph').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'line', // Utilisation d'un graphique de type ligne pour l'évolution
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Avancement des taches(%)',
                    data: {!! json_encode($data) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.3, // Tension de la courbe (0 = ligne droite)
                    fill: true // Remplissage sous la courbe
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
</body>
</html>
