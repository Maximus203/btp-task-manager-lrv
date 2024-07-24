<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de bord</title>
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
.btn-details {
    display: inline-block;
    background-color: #76A9FA;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-details:hover {
    background-color: #1a91da; /* Couleur plus foncée au survol */
}
    </style>
</head>
<body class="bg-white min-h-screen">
<div style="width: 80%" class="container xl:container mx-auto mt-05 ml-60">

    <main class="p-4">

        <div class="p-4 w-full md:w-1/4">
            <label for="projetSelect" class="block text-gray-700 font-bold mb-2">Afficher le dashboard d'un autre projet:</label>
            <select id="projetSelect" wire:model="selectedProjetId" class="block w-full border border-gray-300 rounded-lg p-2">
                @foreach ($projets as $projet)
                    <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                @endforeach
            </select>
        </div>
            <center><label for="projetSelect" class="block text-gray-700 font-bold mb-2">Dashboard du client</label></center>
<br>
        <div class="flex bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="w-full md:w-1/4 bg-gray-100 p-4">
                <div class="mb-4 text-center">
                    <img src="images/user.png" alt="Profile Picture" class="w-20 h-20 rounded-full mx-auto mb-2">
                    <h2 class="text-xl font-semibold">
                        <a href="{{ route('profile') }}" class="text-gray-900 dark:text-white">{{ __(Auth::user()->prenom . ' ' . Auth::user()->nom) }}</a>
                    </h2>
                    <p class="text-gray-500">{{ Auth::user()->email }}</p>
                </div>
                <h3 class="text-xl font-bold mb-2 text-center">{{ $selectedProjetNom }}</h3>
                <div>
                    @php
                        $prixTotalInitial = 0;
                        $prixTotalRestant = 0;
                        $labels = [];
                        $data = [];
                        $progressionTotale = 0;

                        function getStatutLabel($statut) {
                            return match ($statut) {
                                'initial' => 'Initial',
                                'en_cours' => 'En cours',
                                'terminer' => 'Terminer',
                                default => 'Inconnu'
                            };
                        }
                    @endphp
                    <div>
                        @foreach ($taches as $tache)
                            @php
                                $prixTotalInitial += $tache->budget;
                                if ($tache->statut !== 'terminer') {
                                    $prixTotalRestant += $tache->budget;
                                }

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
                                <p class="text-gray-600 flex items-center">
                                    <span class="status-indicator
                                        @if ($tache->statut === 'initial') bg-red-600
                                        @elseif ($tache->statut === 'en_cours') bg-orange-400
                                        @elseif ($tache->statut === 'terminer') bg-green-400
                                        @else bg-gray-400
                                        @endif"></span>
                                    Statut: {{ getStatutLabel($tache->statut) }}
                                </p>
                                <a href="{{ route('details-tache', ['id' => $tache->idTache]) }}" class="btn-details">Voir les détails</a>
                            </div>
                        @endforeach
                        @php
                            $progressionTotale = $progressionTotale / count($taches);
                        @endphp
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-xl font-bold mb-2">Prix Total des Tâches</h3>
                    <p class="text-gray-600">Montant Initial: {{ $prixTotalInitial }}</p>
                    <p class="text-gray-600">Montant Restant: {{ $prixTotalRestant }}</p>
                </div>
            </div>

            <div class="w-full md:w-3/4 p-4">
                <div class="mb-4">
                    <img src="images/btp.png" alt="Entreprise BTP" class="w-full h-64 object-cover rounded-lg shadow-md">
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    @foreach ($taches as $tache)
                        @foreach ($this->images[$tache->idTache] as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image) }}" alt="Project Image" class="w-full h-48 object-cover rounded-lg shadow-md">
                                <div class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-50 p-2 text-center text-white">
                                    {{ $tache->nomTache }}
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2 text-center">Évolution du projet: {{ $taches->first()->projet->nomProjet }}</h3>
                    <div class="bg-white p-4 rounded-lg shadow-lg" style="width: 100%; max-width: 2000px; margin: 0 auto;">
                        <canvas id="evolutionGraph"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ctx = document.getElementById('evolutionGraph').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Avancement des taches(%)',
                    data: {!! json_encode($data) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.3,
                    fill: true
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
</div>
</body>
</html>
