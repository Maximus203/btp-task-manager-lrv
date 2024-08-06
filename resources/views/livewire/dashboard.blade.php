{{-- <!DOCTYPE html>
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

        .tache-card {
            cursor: pointer;
            transition: transform 0.3s;
        }

        .tache-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-white min-h-screen">
<div style="width: 80%" class="container xl:container mx-auto mt-05 ml-60">
    <main class="p-4">

        <br>
<div class="p-4 w-full flex flex-wrap gap-4">

    <!-- Prix Total des Tâches -->
    <div class="w-full md:w-1/2 lg:w-1/4 bg-gray-100 p-4 text-black">
        <div>
            @php
                $prixTotalInitial = 0;
                $prixTotalRestant = 0;
                $labels = [];
                $data = [];
                $progressionTotale = 0;

                $tachesInitial = 0;
                $tachesEnCours = 0;
                $tachesTerminer = 0;
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
                            $tachesTerminer++;
                            $data[] = 100;
                            $progressionTotale += 100;
                        } elseif ($tache->statut === 'en_cours') {
                            $tachesEnCours++;
                            $data[] = 50;
                            $progressionTotale += 50;
                        } else {
                            $tachesInitial++;
                            $data[] = 0;
                        }
                    @endphp
                @endforeach
                @php
                    $progressionTotale = $progressionTotale / count($taches);
                    $totalTaches = count($taches);
                    $pourcentageInitial = ($tachesInitial / $totalTaches) * 100;
                    $pourcentageEnCours = ($tachesEnCours / $totalTaches) * 100;
                    $pourcentageTerminer = ($tachesTerminer / $totalTaches) * 100;
                @endphp
            </div>
            <div class="mt-4 block bg-white p-4 rounded-lg shadow-md tache-card">
                <h3 class="text-xl font-bold mb-2">Prix des Tâches</h3>
                <p class="text-gray-900">Budget total: {{ $prixTotalInitial }}</p>
                <p class="text-gray-900">Budget Restant: {{ $prixTotalRestant }}</p>
            </div>
        </div>
    </div>
        <!-- Filtre de sélection de projet -->

<div style="margin-left: 48%" class="w-full md:w-1/2 lg:w-1/4">
    <label for="projetSelect" class="block text-gray-900 font-bold mb-2">Afficher le dashboard d'un autre projet:</label>
    <select id="projetSelect" wire:model="selectedProjetId" class="block w-full border border-gray-300 rounded-lg p-2">
        @foreach ($projets as $projet)
            <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
        @endforeach
    </select>
</div>


</div>

        <center><label for="projetSelect" class="block text-gray-900 font-bold mb-2"><h2 class="text-xl font-bold mb-2 text-center">{{ $selectedProjetNom }}</h2>
</label></center>
        <div class="mt-4">
            <h3 class="text-xl font-bold mb-2 text-center">Evolution du projet</h3>
            <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
                <div class="bg-green-500 h-4 rounded-full" style="width: {{ $pourcentageTerminerEvolution }}%;"></div>
            </div>
            <p class="text-center text-gray-600">{{ $pourcentageTerminerEvolution }}% des tâches terminées</p>
        </div>
        <br>
        <div class="flex bg-white shadow-lg rounded-lg overflow-hidden">

<div class="w-full p-4">
    <!-- Section du graphique -->
    <div class="w-full mb-4">
        <h3 class="text-xl font-bold mb-2 text-center">Évolution des statuts des tâches</h3>
            <div class="bg-white p-4 rounded-lg shadow-lg mx-auto" style="max-width: 800px;">
                <canvas id="statusBarChart"></canvas>
            </div>
    </div>

<!-- Section des tâches -->
<div class="text-center mb-6">
    <h1 class="text-2xl font-extrabold text-gray-900">Les tâches du projet</h1>
</div>

<div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($taches as $tache)
        <a href="{{ route('details-tache', ['id' => $tache->idTache]) }}" class="block bg-white p-4 rounded-lg shadow-md tache-card">
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
                Statut: {{ $getStatutLabel($tache->statut) }}
            </p>
        </a>
    @endforeach
</div>

</div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ctx = document.getElementById('statusBarChart').getContext('2d');
        let statusBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Initial', 'En cours', 'Terminer'],
                datasets: [{
                    label: 'Pourcentage des Tâches',
                    data: [{{ $pourcentageInitial }}, {{ $pourcentageEnCours }}, {{ $pourcentageTerminer }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
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
</html> --}}


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
            background-color: #1a91da;
        }

        .tache-card {
            cursor: pointer;
            transition: transform 0.3s;
        }

        .tache-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-white min-h-screen">
<div style="width: 80%" class="container xl:container mx-auto mt-05 ml-60">
    <main class="p-4">
        <br>
        <div class="p-4 w-full flex flex-wrap gap-4">
            <!-- Prix Total des Tâches -->
            <div class="w-full md:w-1/2 lg:w-1/4 bg-gray-100 p-4 text-black">
                <div>
                    @php
                        $prixTotalInitial = 0;
                        $prixTotalRestant = 0;
                        $labels = [];
                        $data = [];
                        $progressionTotale = 0;

                        $tachesInitial = 0;
                        $tachesEnCours = 0;
                        $tachesTerminer = 0;
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
                                    $tachesTerminer++;
                                    $data[] = 100;
                                    $progressionTotale += 100;
                                } elseif ($tache->statut === 'en_cours') {
                                    $tachesEnCours++;
                                    $data[] = 50;
                                    $progressionTotale += 50;
                                } else {
                                    $tachesInitial++;
                                    $data[] = 0;
                                }
                            @endphp
                        @endforeach
                        @php
                            $progressionTotale = $progressionTotale / count($taches);
                            $totalTaches = count($taches);
                            $pourcentageInitial = ($tachesInitial / $totalTaches) * 100;
                            $pourcentageEnCours = ($tachesEnCours / $totalTaches) * 100;
                            $pourcentageTerminer = ($tachesTerminer / $totalTaches) * 100;
                        @endphp
                    </div>
                    <div class="mt-4 block bg-white p-4 rounded-lg shadow-md tache-card">
                        <h3 class="text-xl font-bold mb-2">Prix des Tâches</h3>
                        <p class="text-gray-900">Budget total: {{ $prixTotalInitial }}</p>
                        <p class="text-gray-900">Budget Restant: {{ $prixTotalRestant }}</p>
                    </div>
                </div>
            </div>

            <!-- Filtre de sélection de projet -->
            <div style="margin-left: 48%" class="w-full md:w-1/2 lg:w-1/4">
                <label for="projetSelect" class="block text-gray-900 font-bold mb-2">Afficher le dashboard d'un autre projet:</label>
                <select id="projetSelect" wire:model="selectedProjetId" class="block w-full border border-gray-300 rounded-lg p-2">
                    @foreach ($projets as $projet)
                        <option value="{{ $projet->idProjet }}">{{ $projet->nomProjet }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <center><label for="projetSelect" class="block text-gray-900 font-bold mb-2"><h2 class="text-xl font-bold mb-2 text-center">{{ $selectedProjetNom }}</h2></label></center>

        <div class="mt-4">
            <h3 class="text-xl font-bold mb-2 text-center">Evolution du projet</h3>
            <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
                <div class="bg-green-500 h-4 rounded-full" style="width: {{ $pourcentageTerminerEvolution }}%;"></div>
            </div>
            <p class="text-center text-gray-600">{{ $pourcentageTerminerEvolution }}% des tâches terminées</p>
        </div>

        <br>
        <div class="flex bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="w-full p-4">
                <!-- Section du graphique -->
                <div class="w-full mb-4">
                    <h3 class="text-xl font-bold mb-2 text-center">Évolution des statuts des tâches</h3>
                    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto" style="max-width: 800px;">
                        <canvas id="statusBarChart"></canvas>
                    </div>
                </div>

                <!-- Section des tâches -->
                <div class="text-center mb-6">
                    <h1 class="text-2xl font-extrabold text-gray-900">Les tâches du projet</h1>
                </div>

                <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($taches as $tache)
                        <a href="{{ route('details-tache', ['id' => $tache->idTache]) }}" class="block bg-white p-4 rounded-lg shadow-md tache-card">
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
                                Statut: {{ $getStatutLabel($tache->statut) }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ctx = document.getElementById('statusBarChart').getContext('2d');
        let statusBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Initial', 'En cours', 'Terminer'],
                datasets: [{
                    label: 'Pourcentage des Tâches',
                    data: [{{ $pourcentageInitial }}, {{ $pourcentageEnCours }}, {{ $pourcentageTerminer }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
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
