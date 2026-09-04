<?php
session_start();
//Verificar si la sesion esta iniciada
if (isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    $redirectUrl = $isEnglish ? "../HTML/INGLES/PrincipalING.php" : "../HTML/ESPANOL/Principal.php";
    
    header("Location: " . $redirectUrl);
    exit; 
}
    ?><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Canrisk - Cancer information and support</title>
        <link rel="stylesheet" href="../CSS/Style-Info.css">
        <link rel="stylesheet" href="../CSS/principal.css">
        <link rel="stylesheet" href="../CSS/cancer.css">
        <link rel="icon" type="image/png" href="../MULTIMEDIA/Canrisk LOGO.svg">
    </head>
    <body>

        <!-- LOGO AND SIDEBAR TOGGLE BUTTON -->
        <div class="navbar-brand">
            <h1>Canrisk</h1>
            <img src="../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" class="C-L">
        </div>


        <!-- TOP NAVIGATION BAR -->
        <nav class="navbar" id="mainNav">

            <button class="hamburger" id="hamburgerBtn" aria-label="Open menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="Info-nav">
                <li class="box-II"><h4><a href="../INICIO/Faq.N-ING.php">Frequently Asked Questions</a></h4></li>
                <li class="box-II"><a href="../INICIO/IndexING.php"><h4>Home Page</h4></a></li>
            </ul>

            <div class="right-group">
                <ul class="Index">
                    <li class="box-I"><a href="../HTML/INGLES/loginING.php"><h4>Log in</h4></a></li>
                    <li class="box-I"><a href="../HTML/INGLES/registerING.php"><h4>Sign Up</h4></a></li>
                </ul>
                <a id="langSwitchNL" class="lang-switchNL" href="../INICIO/Index.php" aria-label="Cambiar idioma / Switch language">ES</a>
                <div class="Photo">
                    <img src="../MULTIMEDIA/profile.png" class="PP-default" alt="User profile picture">
                </div>
            </div>

        </nav>
        <!-- ENCABEZADO PRINCIPAL (HERO) --> 
        <header class="hero-section">
        <!-- CAROUSEL DE IMAGENES -->
        <div class="carousel">
            <div class="carousel-track" id="track">
            <div class="carousel-slide"><img src="../MULTIMEDIA/1.jpg" alt=></div>
            <div class="carousel-slide"><img src="../MULTIMEDIA/5.jpg" alt=></div>
            <div class="carousel-slide"><img src="../MULTIMEDIA/6.jpg" alt=></div>
            </div>
            <div class="carousel-container">
                <button class="carousel-button prev" onclick="prevSlide()">❮</button>
                <button class="carousel-button next" onclick="nextSlide()">❯</button>

                <!-- NUEVO: Contenedor de indicadores de línea (abajo del carrusel) -->
                <div class="carousel-indicators-lines">
                    <!-- Agrega un botón por cada imagen/slide que tengas en tu carrusel -->
                    <button class="indicator-line active" onclick="currentSlide(0)"></button>
                    <button class="indicator-line" onclick="currentSlide(1)"></button>
                    <button class="indicator-line" onclick="currentSlide(2)"></button>
                </div>
            </div>
        </div>
            <br>
            <div class="hero-container">
                <div class="Titulos-DEG">
                    <h1 class="hero-title">Canrisk, your information site about cancer</h1>
                </div>
                <p class="hero-subtitle">
                    Prevention tools, emotional support, and accompaniment for young people and families
                    facing cancer treatment.
                    <br>
                    <strong>
                        <span class="Negrita">This platform does NOT replace professional medical help.</span>
                    </strong>
                </p>
            </div>
                
    </div>
    <br>
    </div>
        </div>
            <div class="action-container" style="padding-top: 0;">
                    <a href="../HTML/ESPANOL/register.php" class="btn-quizz">Register today and be part of the change</a>
        </div>
        </header>


        <!-- "WHAT'S OUR GOAL?" SECTION -->
        <section class="info-row-container">
            <br>
            <h2 class="info-row-title">What's Our Goal?</h2>
            <div class="info-grid">
                <div class="info-card">
                    <h3>Awareness</h3>
                    <p>We share information about the different types of cancer and how to support a
                        family member going through the disease.</p>
                </div>
                <div class="info-card">
                    <h3>Real Support</h3>
                    <p>We offer financial and psychological guidance to those who don't have many
                        resources to cover their treatments.</p>
                </div>
                <div class="info-card">
                    <h3>Privacy First</h3>
                    <p>We respect the privacy of every person who seeks help on our site, without
                        exception.</p>
                </div>
            </div>
        </section>

        <script>
            /*  Hamburger menu */
            const btn = document.getElementById('hamburgerBtn');
            const nav = document.getElementById('mainNav');

            if (btn && nav) {
                btn.addEventListener('click', () => {
                    const isOpen = nav.classList.toggle('open');
                    btn.classList.toggle('open', isOpen);
                    btn.setAttribute('aria-expanded', isOpen);
                });
            }

            /* Sidebar (only exists on internal pages) */
            const sidebarBtn = document.getElementById('sidebarBtn');
            const sidebarMenu = document.getElementById('sidebarMenu');
            const menuOverlay = document.getElementById('menuOverlay');

            if (sidebarBtn && sidebarMenu && menuOverlay) {
                const toggleSidebar = () => {
                    const isOpen = sidebarMenu.classList.toggle('open');
                    sidebarBtn.classList.toggle('open', isOpen);
                    menuOverlay.classList.toggle('show', isOpen);
                    sidebarBtn.setAttribute('aria-expanded', isOpen);
                };
                sidebarBtn.addEventListener('click', toggleSidebar);
                menuOverlay.addEventListener('click', toggleSidebar);
            }

            /* ---- Carousel ---- */
            var currentSlideIndex = 0;
            var track = document.getElementById('track');
            var slides = document.querySelectorAll('.carousel-slide');
            var indicators = document.querySelectorAll('.indicator-line');
            var carousel = document.querySelector('.carousel');

            function showSlide(index) {
                if (!track || slides.length === 0) return;
                // Wrap around
                if (index >= slides.length) index = 0;
                if (index < 0) index = slides.length - 1;
                currentSlideIndex = index;

                // Move the track
                track.style.transform = 'translateX(-' + (currentSlideIndex * 100) + '%)';

                // Update indicator lines
                indicators.forEach(function(ind) { ind.classList.remove('active'); });
                if (indicators[currentSlideIndex]) {
                    indicators[currentSlideIndex].classList.add('active');
                }
            }

            function nextSlide() { showSlide(currentSlideIndex + 1); }
            function prevSlide() { showSlide(currentSlideIndex - 1); }
            function currentSlide(index) { showSlide(index); }

            // Auto-play: avanza cada 15 s, se pausa al pasar el cursor
            var autoPlay = setInterval(nextSlide, 15000);
            if (carousel) {
                carousel.addEventListener('mouseenter', function() { clearInterval(autoPlay); });
                carousel.addEventListener('mouseleave', function() {
                    autoPlay = setInterval(nextSlide, 15000);
                });
            }
        </script>
        <script src="../JS/site.js" defer></script>

        <!-- FOOTER -->
        <footer>
            <div class="footer-container">
                <div class="footer-content">
                    <div class="footer-col">
                        <h2 class="Title">COPYRIGHT</h2>
                        <ul class="Advice">
                            <li>&copy; Canrisk 2026</li>
                            <li>All rights reserved to the Canrisk team.</li>
                            <li>Special thanks to the whole team who made this page possible.</li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h2 class="Title_1">IMPORTANT INFORMATION</h2>
                        <ul class="Advice_1">
                            <li>This page DOES NOT replace the help of a medical professional.</li>
                            <li>In case of an emergency or symptom, rely on the hospital numbers
                                that we provide, or call 911 directly.</li>
                        </ul>
                    </div>
                </div>
            <div class="footer-social">
                <h2 class="Title_2">Canrisk's social media!</h2>
                <ul class="Social">
                    <li><a href="https://www.instagram.com/canrisk/" target="_blank"><img src="../../Canrisk/MULTIMEDIA/instagram.png" class="Inst-IMG" alt="Instagram logo"><p class="Inst-txt">Instagram</p></a></li>
                    <li><a href="https://www.facebook.com/Canrisk-110882646091155" target="_blank"><img src="../../Canrisk/MULTIMEDIA/facebook.png" class="Face-IMG" alt="Facebook logo"><p class="Face-txt">Facebook</p></a></li>
                    <li><a href="https://twitter.com/Canrisk1" target="_blank"><img src="../../Canrisk/MULTIMEDIA/gorjeo.png" class="Twit-IMG" alt="Twitter"><p class="Twit-txt">Twitter</p></a></li>
                </ul>
                </div>
            </div>
        </footer>
    </body>
    </html>