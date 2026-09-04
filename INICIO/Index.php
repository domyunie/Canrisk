<?php
session_start();
//Verificar si la sesion esta iniciada
if (isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    $redirectUrl = $isEnglish ? "../HTML/INGLES/PrincipalING.php" : "../HTML/ESPANOL/Principal.php";
    
    header("Location: " . $redirectUrl);
    exit; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canrisk - Información y apoyo sobre el cáncer</title>
    <link rel="stylesheet" href="../CSS/Style-Info.css">
    <link rel="stylesheet" href="../CSS/principal.css">
    <link rel="stylesheet" href="../CSS/cancer.css">
    <link rel="icon" type="image/png" href="../MULTIMEDIA/Canrisk LOGO.svg">
</head>
<body>

    <!-- LOGO Y BOTÓN PARA ABRIR EL SIDEBAR -->
    <div class="navbar-brand">
        <h1>Canrisk</h1>
        <img src="../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" class="C-L">
    </div>

    <!-- BARRA DE NAVEGACIÓN SUPERIOR -->
    <nav class="navbar" id="mainNav">
        <button class="hamburger" id="hamburgerBtn" aria-label="Abrir menú" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="Info-nav">
            <li class="box-II"><h4><a href="../INICIO/Faq.N.php">Preguntas frecuentes</a></h4></li>
            <li class="box-II"><a href="../INICIO/Index.php"><h4>Inicio</h4></a></li>
        </ul>

        <div class="right-group">
            <ul class="Index">
                <li class="box-I"><a href="../HTML/ESPANOL/login.php"><h4>Iniciar Sesión</h4></a></li>
                <li class="box-I"><a href="../HTML/ESPANOL/register.php"><h4>Registrarse</h4></a></li>
            </ul>
            <a id="langSwitchNL" class="lang-switchNL" href="../INICIO/IndexING.php" aria-label="Switch language">EN</a>
            <div class="Photo">
                <img src="../MULTIMEDIA/profile.png" class="PP-default" alt="Foto de perfil de usuario">
            </div>
        </div>
    </nav>

    <!-- ENCABEZADO PRINCIPAL (HERO) --> 
    <header class="hero-section">
        <!-- CARROUSEL DE IMAGENES -->
        <div class="carousel">
            <div class="carousel-track" id="track">
                <div class="carousel-slide"><img src="../MULTIMEDIA/1.jpg" alt="Imagen informativa 1"></div>
                <div class="carousel-slide"><img src="../MULTIMEDIA/2.jpg" alt="Imagen informativa 2"></div>
                <div class="carousel-slide"><img src="../MULTIMEDIA/3.jpg" alt="Imagen informativa 3"></div>
            </div>
            <div class="carousel-container">
                <button class="carousel-button prev" onclick="prevSlide()">❮</button>
                <button class="carousel-button next" onclick="nextSlide()">❯</button>

                <!-- Contenedor de indicadores de línea -->
                <div class="carousel-indicators-lines">
                    <button class="indicator-line active" onclick="currentSlide(0)"></button>
                    <button class="indicator-line" onclick="currentSlide(1)"></button>
                    <button class="indicator-line" onclick="currentSlide(2)"></button>
                </div>
            </div>
        </div>

        <br>

        <div class="hero-container">
            <div class="Titulos-DEG">
                <h1 class="hero-title">Canrisk, tu sitio informativo sobre el cáncer</h1>
            </div>
            <p class="hero-subtitle">
                Herramientas de prevención, apoyo emocional y acompañamiento para jóvenes y familias
                que enfrentan el tratamiento contra el cáncer.
                <br>
                <strong>
                    <span class="Negrita">Esta plataforma NO reemplaza la ayuda médica profesional.</span>
                </strong>
            </p>
        </div>

        <div class="action-container" style="padding-top: 0;">
            <a href="../HTML/ESPANOL/register.php" class="btn-quizz">Regístrate hoy y sé parte del cambio</a>
        </div>
    </header>

    <!-- SECCIÓN "¿CUÁL ES NUESTRO OBJETIVO?" -->
    <section class="info-row-container">
        <br>
        <h2 class="info-row-title">¿Cuál es nuestro objetivo?</h2>
        <div class="info-grid">
            <div class="info-card">
                <h3>Concientizar</h3>
                <p>Compartimos información sobre los diferentes tipos de cáncer y cómo brindar apoyo a
                    un familiar que atraviesa por la enfermedad.</p>
            </div>
            <div class="info-card">
                <h3>Apoyo Real</h3>
                <p>Ofrecemos orientación económica y psicológica a quienes no disponen de grandes
                    recursos para costear sus tratamientos.</p>
            </div>
            <div class="info-card">
                <h3>Privacidad ante todo</h3>
                <p>Respetamos la privacidad de cada persona que busca ayuda en nuestro sitio, sin
                    excepción.</p>
            </div>
        </div>
    </section>

    <!-- PIE DE PÁGINA (FOOTER) -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-col">
                    <h2 class="Title">DERECHOS DE AUTOR</h2>
                    <ul class="Advice">
                        <li>&copy; Canrisk 2026</li>
                        <li>Todos los derechos reservados al equipo de Canrisk.</li>
                        <li>Agradecimiento especial a todo el equipo que hizo posible esta página.</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h2 class="Title_1">INFORMACIÓN IMPORTANTE</h2>
                    <ul class="Advice_1">
                        <li>Esta página NO reemplaza la ayuda de un profesional médico.</li>
                        <li>En caso de una emergencia o síntoma, apóyate en los números de hospitales
                            que brindamos o llama directamente al 911.</li>
                    </ul>
                </div>
            </div>
            <div class="footer-social">
                <h2 class="Title_2">¡Redes sociales de Canrisk!</h2>
                <ul class="Social">
                    <li><a href="https://www.instagram.com/canrisk/" target="_blank"><img src="../../Canrisk/MULTIMEDIA/instagram.png" class="Inst-IMG" alt="Logo de Instagram"><p class="Inst-txt">Instagram</p></a></li>
                    <li><a href="https://www.facebook.com/Canrisk-110882646091155" target="_blank"><img src="../../Canrisk/MULTIMEDIA/facebook.png" class="Face-IMG" alt="Logo de Facebook"><p class="Face-txt">Facebook</p></a></li>
                    <li><a href="https://twitter.com/Canrisk1" target="_blank"><img src="../../Canrisk/MULTIMEDIA/gorjeo.png" class="Twit-IMG" alt="Twitter"><p class="Twit-txt">Twitter</p></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS DE NAVEGACIÓN Y CARRUSEL -->
    <script>
        /* Menú hamburguesa */
        const btn = document.getElementById('hamburgerBtn');
        const nav = document.getElementById('mainNav');

        if (btn && nav) {
            btn.addEventListener('click', () => {
                const isOpen = nav.classList.toggle('open');
                btn.classList.toggle('open', isOpen);
                btn.setAttribute('aria-expanded', isOpen);
            });
        }

        /* Sidebar (solo para páginas internas si aplica) */
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

        /* ---- Carrusel de imágenes ---- */
        var currentSlideIndex = 0;
        var track = document.getElementById('track');
        var slides = document.querySelectorAll('.carousel-slide');
        var indicators = document.querySelectorAll('.indicator-line');
        var carousel = document.querySelector('.carousel');

        function showSlide(index) {
            if (!track || slides.length === 0) return;
            
            if (index >= slides.length) index = 0;
            if (index < 0) index = slides.length - 1;
            currentSlideIndex = index;

            track.style.transform = 'translateX(-' + (currentSlideIndex * 100) + '%)';

            indicators.forEach(function(ind) { ind.classList.remove('active'); });
            if (indicators[currentSlideIndex]) {
                indicators[currentSlideIndex].classList.add('active');
            }
        }

        function nextSlide() { showSlide(currentSlideIndex + 1); }
        function prevSlide() { showSlide(currentSlideIndex - 1); }
        function currentSlide(index) { showSlide(index); }

        var autoPlay = setInterval(nextSlide, 15000);
        if (carousel) {
            carousel.addEventListener('mouseenter', function() { clearInterval(autoPlay); });
            carousel.addEventListener('mouseleave', function() {
                autoPlay = setInterval(nextSlide, 15000);
            });
        }
    </script>
    <script src="../JS/site.js" defer></script>
</body>
</html>