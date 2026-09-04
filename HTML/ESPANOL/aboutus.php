<?php
session_start();
if (!isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    $redirectUrl = $isEnglish ? "LoginING.php" : "login.php";
    
    header("Location: " . $redirectUrl);
    exit; 
}

$sesion    = $_SESSION["userSession"] ?? null;
$isEnglish = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css">
    <link rel="stylesheet" href="../../CSS/aboutus.css">
    <link rel="icon" type="image/png" href="../../MULTIMEDIA/Canrisk LOGO.svg">
</head>
<body>
 
    <!--  LOGO Y BOTÓN DEL MENÚ LATERAL  -->
    <div class="navbar-brand">
        <button class="hamburger-sidebar-btn" id="sidebarBtn" aria-label="Abrir menú lateral">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1>Canrisk</h1>
        <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" class="C-L"> 
    </div>
    
    <!--  MENÚ LATERAL (SIDEBAR)  -->
    <nav class="sidebar-menu" id="sidebarMenu">
        <div class="sidebar-decoracion">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <ul class="sidebar-list">
            <li><a href="cancer-intro.php">Introducción al cáncer &rarr;</a></li>
            <li><a href="cancer.php">Tipos de Cáncer &rarr;</a></li>
            <li><a href="psycho-help.php">Apoyo psicológico &rarr;</a></li>
            <li><a href="help.php">Centro de ayuda &rarr;</a></li>
            <li><a href="quizz.php">Cuestionario &rarr;</a></li>
            <li><a href="faq.php">Preguntas frecuentes &rarr;</a></li>
        </ul>
    </nav>

    <!--  FONDO OSCURO AL ABRIR EL SIDEBAR  -->
    <div class="overlay-menu" id="menuOverlay"></div>
 
    <!--  BARRA DE NAVEGACIÓN SUPERIOR  -->
    <nav class="navbar" id="mainNav">
 
        <button class="hamburger" id="hamburgerBtn" aria-label="Abrir menú" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
 
        <ul class="Info-nav">
            <li class="box-II"><h4><a href="../ESPANOL/Principal.php">Inicio</a></h4></li>
            <li class="box-II"><a href="../ESPANOL/aboutus.php"><h4>Sobre nosotros</h4></a></li>
            <li class="box-II"><a href="../ESPANOL/Contacto.php"><h4>Contáctanos</h4></a></li>
        </ul>
 
        <div class="right-group">
        <a
          id="langSwitch"
          class="lang-switch"
          href="<?php echo $isEnglish ? '../Principal.php' : 'INGLES/PrincipalING.php'; ?>"
          aria-label="Cambiar idioma / Switch language"
          ><?php echo $isEnglish ? 'ES' : 'EN'; ?></a
        >

        <?php if ($sesion): ?>
          <div class="Photo user-session">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="48"
              height="48"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
              />
            </svg>
            <div class="user-info">
              <span class="session-label">
                <?php echo $isEnglish ? 'Signed in as' : 'Sesión iniciada como'; ?>
              </span>
              <strong><?php echo htmlspecialchars($sesion['username'], ENT_QUOTES); ?></strong>
              <a class="logout-link" href="../../PHP/logout.php">
                <?php echo $isEnglish ? 'Log out' : 'Cerrar sesión'; ?>
              </a>
            </div>
          </div>
        <?php else: ?>
          <div class="Photo">
            <a
              href="login.php"
              aria-label="Iniciar sesión / Login"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="48"
                height="48"
                fill="currentColor"
                class="bi bi-person-circle"
                viewBox="0 0 16 16"
              >
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path
                  fill-rule="evenodd"
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
                />
              </svg>
            </a>
          </div>
        <?php endif; ?>
      </div>
 
    </nav>
 
    <!--  ENCABEZADO DE LA PÁGINA  -->
    <header class="hero-section">
        <div class="hero-container">
            <h1 class="hero-title">Sobre nosotros</h1>
 
            <div class="hero-subtitle">
                <p>Canrisk es un sitio web informativo con la finalidad de 
                    informar a la sociedad de forma accesible y confiable acerca
                    los tipos de cáncer más frecuentes en la población salvadoreña: 
                    el cáncer de mama, cérvix, próstata, estómago y pulmón.
                </p>
            </div>
        </div>
    </header>
 
    <div class="contenedor-flex-lateral">
        <div class="bloque-tarjetas-originales">
            <div class="content-text">
                <p>Nuestro proyecto recibe el nombre de <strong class="Negrita">Canrisk</strong> porque
                nace de la unión de dos palabras: cáncer y <em>risk</em> (riesgo, en inglés). Elegimos esa
                fusión para darle a la página un enfoque cercano y fácil de recordar.</p>
            </div>
        </div>

           <div class="IMG">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="../../MULTIMEDIA/cancer imagen.jpg" alt="Equipo de Canrisk" class="IMG-TXT">
                    </div>
                    <div class="flip-card-back">
                        <p>Este proyecto fue creado por un equipo de
                        estudiantes comprometidos con acercar información médica confiable a quienes más la
                        necesitan.</p>
                    </div>
                </div>
                <span class="flip-hint">Pasa el mouse sobre la imagen para ver un dato rápido</span>
            </div>
        </div>
    </div>

    <section class="info-row-container">
        <h2 class="info-row-title">Lo que nos mueve</h2>
        <div class="info-grid">
            <div class="info-card">
                <h3>Nuestra misión</h3>
                <p>Acercar información médica clara y confiable sobre el cáncer de mama, cérvix,
                    próstata, estómago y pulmón a la población salvadoreña, sin tecnicismos innecesarios.</p>
            </div>
            <div class="info-card">
                <h3>Nuestro enfoque</h3>
                <p>Realizar un sitio web informativo, especializado en el área del cáncer, que permita informar al usuario 
                    sobre esta enfermedad, acceder a servicios hospitalarios cercanos, dar a conocer tratamientos disponibles 
                    y realizar cuestionarios para conocer más sobre esta letal enfermedad.</p>
            </div>
            <div class="info-card">
                <h3>Nuestro compromiso</h3>
                <p>Publicar información clara y verificada sobre los tipos de cáncer más comunes en El Salvador, 
                    mediante secciones temáticas dentro del sitio web, para que el usuario pueda conocer y comprender 
                    esta enfermedad y sus variantes de forma accesible.</p>
            </div>
        </div>
    </section>

  <div class="hero-container">
            <h1 class="hero-title">Nuestro equipo</h1>
 
            <div class="hero-subtitle">
                <p>Canrisk es una realidad gracias a nuestro equipo detrás de él.</p>
            </div>
             <div class="bloque-tarjetas-originales">
                <img src="../../MULTIMEDIA/Aboutus.png" alt="Equipo de Canrisk" class="IMG-TXT">
             </div>
        </div>


 
<!--  PIE DE PÁGINA -->
    <footer>
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-col">
                <h2 class="Title">DERECHOS DE AUTOR</h2>
                <ul class="Advice">
                    <li>&copy; Canrisk 2026</li>
                    <li>&copy; Todos los derechos reservados al equipo de Canrisk. Agradecimientos especiales al equipo de Canrisk que han hecho esta página algo posible.</li>
                </ul>
            </div>
            <div class="footer-col">
                <h2 class="Title_1">INFORMACIÓN IMPORTANTE</h2>
                <ul class="Advice_1">
                    <li>Esta página NO reemplaza la ayuda de un profesional médico.</li>
                    <li>En caso de tener algún tipo de emergencia o un síntoma puede apoyarse en los diferentes números de hospitales que nosotros proporcionamos, o llamar directamente al 911.</li>
                </ul>
            </div>
        </div>
        <div class="footer-social">
            <h2 class="Title_2">Redes sociales de Canrisk!</h2>
            <ul class="Social">
                <li><a href="https://www.instagram.com/canrisk/" target="_blank">
                    <img src="../../MULTIMEDIA/instagram.png" class="Inst-IMG" alt="Instagram logo">
                    <span class="Inst-txt">Instagram</span>
                </a></li>
                <li><a href="https://www.facebook.com/Canrisk-110882646091155" target="_blank">
                    <img src="../../MULTIMEDIA/facebook.png" class="Face-IMG" alt="Facebook logo">
                    <span class="Face-txt">Facebook</span>
                </a></li>
                <li><a href="https://twitter.com/Canrisk1" target="_blank">
                    <img src="../../MULTIMEDIA/gorjeo.png" class="Twit-IMG" alt="Twitter">
                    <span class="Twit-txt">Twitter</span>
                </a></li>
            </ul>
        </div>
    </div>
</footer>
 
    <script>
        const btn = document.getElementById('hamburgerBtn');
        const nav = document.getElementById('mainNav');
 
        btn.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('open');
            btn.classList.toggle('open', isOpen);
            btn.setAttribute('aria-expanded', isOpen);
        });
 
        const sidebarBtn = document.getElementById('sidebarBtn');
        const sidebarMenu = document.getElementById('sidebarMenu');
        const menuOverlay = document.getElementById('menuOverlay');
        const toggleSidebar = () => {
            const isOpen = sidebarMenu.classList.toggle('open');
            sidebarBtn.classList.toggle('open', isOpen);
            menuOverlay.classList.toggle('show', isOpen);
        };
 
        sidebarBtn.addEventListener('click', toggleSidebar);
        menuOverlay.addEventListener('click', toggleSidebar);
    </script>
 
    <script src="../../JS/site.js" defer></script>
</body>
</html>