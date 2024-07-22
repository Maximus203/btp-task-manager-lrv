<x-app-layout>

<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Construction Animation</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        @vite('resources/css/styles.css')
    </head>
    <body>
        <div class="slideshow-container">
            <!-- Première image -->
            <div class="mySlides active" style="background-image: url('{{ asset('images/a.jpg') }}');"></div>
            <!-- Deuxième image -->
            <div class="mySlides" style="background-image: url('{{ asset('images/b.jpg') }}');"></div>
           
            <!-- Utilisation d'une icône de hamburger SVG -->
            <div class="menu-icon" onclick="toggleDropdown()">
                <i class="fas fa-bars"></i>
            </div>
            <div id="dropdown" class="dropdown-content">
                <a href="#">À propos de nous</a>
                <a href="#">Contact</a>
                <a href="#">Service</a>
            </div>
            <!-- Texte de bienvenue -->
            <div class="welcome-text">
                <h1>Bienvenue chez HAWEL KEBE</h1>
                <p>Votre partenaire de confiance pour tous vos projets de construction et de rénovation. Avec une expertise éprouvée et un engagement inébranlable envers la qualité, nous transformons vos idées en réalités tangibles.</p>
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

        <!-- Section des statistiques -->
        <div class="section" id="statistics">
            <h2>Nos Réalisations</h2>
            <div class="stats-container">
                <div class="stats-card">
                    <h3>500+</h3>
                    <p>Projets Réalisés</p>
                </div>
                <div class="stats-card">
                    <h3>20+</h3>
                    <p>Experts Qualifiés</p>
                </div>
                <div class="stats-card">
                    <h3>15</h3>
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

        <!-- Pied de page -->
        <footer class="footer">
            <div class="footer-content">
                <img src="{{ asset('images/logo.jpeg') }}" alt="HAWELKEBE Logo" class="footer-logo">
                <p class="company-name">HAWELKEBE</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/HAWELKEBE" target="_blank" class="social-icon facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="https://twitter.com/HAWELKEBE" target="_blank" class="social-icon twitter">
                        <i class="fab fa-twitter"></i>
                        <span>Twitter</span>
                    </a>
                    <a href="https://www.instagram.com/hawelkebeconstructionsenegal?igsh=MWo3MG5lanY5b3Q4" target="_blank" class="social-icon instagram">
                        <i class="fab fa-instagram"></i>
                        <span>Instagram</span>
                    </a>
                </div>
            </div>
            <p class="footer-note">&copy; 2024 HAWEL Kebe. Tous droits réservés.</p>
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
        </script>
    </body>
    </html>
</x-app-layout>

</x-app-layout>
