<x-app-layout>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Animation de Construction</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        @vite('resources/css/styles.css')
    </head>
    <body>
        <div class="slideshow-container">
            <!-- Première image -->
            <div class="mySlides active" style="background-image: url('{{ asset('images/a.jpg') }}');"></div>
            <!-- Deuxième image -->
            <div class="mySlides" style="background-image: url('{{ asset('images/b.jpg') }}');"></div>

            <!-- Icône de menu hamburger -->
            {{-- <div class="menu-icon" onclick="toggleDropdown()">
                <i class="fas fa-bars"></i>
            </div>
            <div id="dropdown" class="dropdown-content">
                <a href="#">À propos de nous</a>
                <a href="#">Contact</a>
                <a href="#">Service</a>
            </div> --}}
            <!-- Texte de bienvenue -->
            <div id="accueil" class="welcome-text">
                <h1 class="text-l">Bienvenue chez HAWEL KEBE</h1>
            
                <p class="text-m">Votre partenaire de confiance pour tous vos projets de construction et de rénovation. Avec une expertise éprouvée et un engagement inébranlable envers la qualité, nous transformons vos idées en réalités tangibles.</p>
            </div>
        </div>

        <!-- Sections supplémentaires -->
        <div class="section about-section" id="about-us">
            <h2>À propos de nous</h2>
            <div class="about-us">
                <img src="{{ asset('images/equipe.jpeg') }}" alt="À propos de nous">
                <div class="about-us-content">
                    <p>Chez <b>HAWEL KEBE</b>, nous sommes spécialisés dans le domaine du BTP (Bâtiments et Travaux Publics). Nous proposons une large gamme de services professionnels pour répondre à vos besoins en matière de construction, de rénovation, et d'aménagement d'ouvrages publics et privés. Notre équipe d'experts qualifiés et expérimentés est compétente dans la gestion de projets de toute envergure, du plus petit au plus complexe. Nous mettons un point d'honneur à fournir un travail de qualité respectant les normes les plus élevées de l'industrie et répondant aux attentes de nos clients.</p>
                </div>
            </div>
        </div>

        <!-- Section des services -->
<div class="section" id="services">
    <h2>Nos Services</h2>
    <div class="services-container">
        <div class="service-item">
            <i class="fas fa-hard-hat"></i>
            <h3>Gros Œuvre</h3>
            <p>Travaux de fondations, murs, et structure.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-th-large"></i> 
            <h3>Carrelage</h3>
            <p>Pose et rénovation de carrelages.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-paint-roller"></i>
            <h3>Peinture</h3>
            <p>Peinture intérieure et extérieure.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-home"></i>
            <h3>Décoration d'Intérieur</h3>
            <p>Design et aménagement intérieur.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-pallet"></i> 
            <h3>Pavage</h3>
            <p>Aménagement des espaces extérieurs.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-cogs"></i>
            <h3>Faux Plafond en BA13</h3>
            <p>Installation de faux plafonds en BA13.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-wrench"></i>
            <h3>Cloisonnement</h3>
            <p>Création de cloisons pour séparer les espaces.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-paint-brush"></i>
            <h3>Finition</h3>
            <p>Finitions et détails de construction.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-road"></i>
            <h3>Voirie</h3>
            <p>Travaux de voirie et d'infrastructure.</p>
        </div>
    </div>
</div>

<!-- La section des statistiques existante -->
<div class="section" id="statistics">
    <h2>Nos Statistiques</h2>
    <div class="stats-container">
        <div class="stats-card">
            <h3 class="stat-number" data-target="500">0</h3>
            <p>Projets Réalisés</p>
        </div>
        <div class="stats-card">
            <h3 class="stat-number" data-target="30">0</h3>
            <p>Experts Qualifiés</p>
        </div>
        <div class="stats-card">
            <h3 class="stat-number" data-target="20">0</h3>
            <p>Années d'Expérience</p>
        </div>
    </div>
</div>






        <!-- Section Contact -->
        <section id="contact" class="section contact-section">
            <h2>Contactez-nous</h2>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <p>Téléphone : <a href="tel:+7778686785">77 868 67 85</a></p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <p>Email : <a href="mailto:hawelkebe@gmail.com">hawelkebe@gmail.com</a></p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Localisation : Sac Nguinth, Thies, Sénégal</p>
                </div>
            </div>
        </section>
<br>
        <!-- Pied de page -->
<footer class="footer">
    <div class="footer-column logo-column">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo HAWELKEBE" class="footer-logo">
        <p class="company-name">HAWELKEBE</p>
            {{-- <p class="footer-note">&copy; 2024 HAWEL Kebe. Tous droits réservés.</p> --}}
    </div>
    <div class="footer-column">
        <h4>Nos services</h4>
        <div class="social-media">
            <a href="#"target="_blank" class="social-icon twitter">
                <i class="fas fa-hard-hat"></i> 
                <span>Construction</span>
            </a>
            <a href="#" target="_blank" class="social-icon twitter">
                <i class="fas fa-paint-roller"></i> 
                <span>Décoration</span>
            </a>
             <br>
            <a href="#" target="_blank" class="social-icon twitter">
                <i class="fas fa-road"></i>
                <span>Voirie</span>
            </a>
        </div>
    </div>

        <div class="footer-column">
        <h4>Contactez-nous</h4>
        <!-- Ajoutez ici le contenu pour vos contact -->
            <div class="social-media">
                <a href="tel:+7778686785" target="_blank" class="social-icon twitter">
                    <i class="fas fa-phone-alt"></i>
                    <span>téléphone</span>
                </a>
                <a href="mailto:hawelkebe@gmail.com" target="_blank" class="social-icon twitter">
                    <i class="fas fa-envelope"></i>
                    <span>email</span>
                </a>
                <br>
                <a href="" target="_blank" class="social-icon twitter">
                    <i class="fas fa-map-marker-alt"></i>  
                    <span>localisation</span>             
                </a>
        </div>
    </div>
    <div class="footer-column">
        <h4>Suivez-nous</h4>
        <div class="social-media">
            <a href="https://www.facebook.com/HAWELKEBE" target="_blank" class="social-icon facebook">
                <i class="fab fa-facebook-f"></i>
                <span>Facebook</span>
            </a>
            <a href="https://twitter.com/HAWELKEBE" target="_blank" class="social-icon twitter">
                <i class="fab fa-twitter"></i>
                <span>Twitter</span>
            </a>
            <br>
            <a href="https://www.instagram.com/hawelkebeconstructionsenegal?igsh=MWo3MG5lanY5b3Q4" target="_blank" class="social-icon instagram">
                <i class="fab fa-instagram"></i>
                <span>Instagram</span>
            </a>
        </div>
    </div>
{{-- <div class="footer-column">
    <h4>Plus d'Informations</h4>
    <div class="social-media">
        <a href="#"  target="_blank" class="social-icon twitter">
            <i class="fas fa-users"></i>
            <span>Témoignages</span>
        </a>
        <a href="#"  target="_blank" class="social-icon twitter">
            <i class="fas fa-handshake"></i>
            <span>Nos Partenaires</span>
        </a>
        <a href="#"  target="_blank" class="social-icon twitter">
            <i class="fas fa-user-shield"></i>
            <span>Politique de Confidentialité</span>
        </a>
    </div>
</div> --}}

</footer>

        <script>
            let slideIndex = 0;
            const slides = document.getElementsByClassName("mySlides");

            function showSlides() {
                slides[slideIndex].classList.remove("active");
                slideIndex = (slideIndex + 1) % slides.length;
                slides[slideIndex].classList.add("active");

                setTimeout(showSlides, 5000); // Changer de diapositive toutes les 5 secondes
            }

            // Démarrer le diaporama au chargement de la page
            showSlides();

            // Fonction pour basculer l'affichage du menu déroulant
            function toggleDropdown() {
                const dropdown = document.getElementById("dropdown");
                dropdown.classList.toggle("active");
            }

          document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.stat-number');

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        let count = 0;
        const increment = target / 100; // Diviser en 100 étapes pour une animation fluide

        function updateCounter() {
            count += increment;
            if (count < target) {
                counter.innerText = Math.ceil(count) + '+';
                setTimeout(updateCounter, 100);
            } else {
                counter.innerText = target + '+';
            }
        }

        updateCounter();
    });
});


        </script>
    </body>
    </html>
</x-app-layout>
