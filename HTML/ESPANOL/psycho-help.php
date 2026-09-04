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
?><!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apoyo Psicológico - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/psycho-help.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <!--  LOGO Y BOTÓN DEL MENÚ LATERAL  -->
    <div class="navbar-brand">
      <button
        class="hamburger-sidebar-btn"
        id="sidebarBtn"
        aria-label="Abrir menú lateral"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>
      <h1>Canrisk</h1>
      <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" class="C-L" />
    </div>

    <!-- MENÚ LATERAL (SIDEBAR)  -->
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

    <!-- FONDO OSCURO AL ABRIR EL SIDEBAR -->
    <div class="overlay-menu" id="menuOverlay"></div>

    <!-- BARRA DE NAVEGACIÓN SUPERIOR -->
    <nav class="navbar" id="mainNav">
      <button
        class="hamburger"
        id="hamburgerBtn"
        aria-label="Abrir menú"
        aria-expanded="false"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>

      <ul class="Info-nav">
        <li class="box-II">
          <h4><a href="../ESPANOL/Principal.php">Inicio</a></h4>
        </li>
        <li class="box-II">
          <a href="../ESPANOL/aboutus.php"><h4>Sobre nosotros</h4></a>
        </li>
        <li class="box-II">
          <a href="../ESPANOL/Contacto.php"><h4>Contáctanos</h4></a>
        </li>
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
    <div class="Titulos">
      <h1>Apoyo Psicológico</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            El diagnóstico de una enfermedad de alto impacto como el cáncer
            altera profundamente la estabilidad emocional de los pacientes y de
            sus familias. El impacto psicológico puede generar sentimientos de
            incertidumbre, temor, frustración y aislamiento constante.
          </p>
          <br />
          <p>
            Afrontar este proceso requiere un acompañamiento terapéutico
            especializado que valide las emociones, ofrezca herramientas
            prácticas de resiliencia y promueva un espacio seguro de contención
            donde el paciente no se sienta solo en su proceso de adaptación.
          </p>
        </div>
      </div>

      <div class="IMG">
        <img
          src="../../MULTIMEDIA/cancer psico.jpg"
          alt="Apoyo profesional y empatía"
          class="IMG-TXT"
        />
      </div>
    </div>

    <div class="info-grid">
      <div class="info-card">
        <h3>Acompañamiento Profesional</h3>
        <p>
          La terapia psicooncológica asiste a los pacientes en el manejo de la
          ansiedad, el miedo y la depresión que surgen tras el diagnóstico,
          promoviendo una mejor calidad de vida y fortaleciendo su salud mental
          durante los tratamientos.
        </p>
      </div>

      <div class="info-card">
        <h3>Soporte Familiar</h3>
        <p>
          El núcleo cercano también enfrenta una carga emocional abrumadora. Las
          sesiones conjuntas guían a la familia en la comunicación afectiva, la
          empatía, el cuidado mutuo y la gestión colectiva del estrés cotidiano.
        </p>
      </div>

      <div class="info-card">
        <h3>Grupos de Apoyo</h3>
        <p>
          Compartir vivencias con personas que atraviesan situaciones similares
          alivia la sensación de soledad, reduce el aislamiento y fomenta un
          intercambio mutuo de optimismo y estrategias útiles de superación.
        </p>
      </div>

      <div class="info-card">
        <h3>Técnicas de Relajación</h3>
        <p>
          Aprender ejercicios prácticos de meditación, respiración guiada y
          regulación emocional contribuye a disminuir la tensión física y
          mental, devolviendo paulatinamente una sensación de control ante las
          dificultades diarias.
        </p>
      </div>
    </div>

    <!-- FRASES QUE AYUDAN / EVITAR -->
    <div class="phrases-section">
      <h2>Cómo acompañar con las palabras</h2>
      <p class="sub">
        Guía para familiares y amigos: pequeños cambios en el lenguaje pueden
        marcar una gran diferencia
      </p>
      <div class="phrases-columns">
        <div class="phrases-col do">
          <h3>Frases que suelen ayudar</h3>
          <ul>
            <li>"Estoy aquí para ti, sea lo que necesites."</li>
            <li>"No tienes que ser fuerte todo el tiempo conmigo."</li>
            <li>
              "¿Cómo te sientes hoy?" (y escuchar sin apurar la respuesta)
            </li>
            <li>"Cuéntame lo que necesitas, yo me encargo de organizarlo."</li>
            <li>"No sé exactamente qué decir, pero estoy contigo."</li>
          </ul>
        </div>
        <div class="phrases-col dont">
          <h3>Frases que conviene evitar</h3>
          <ul>
            <li>
              "Todo pasa por algo" o comparar su situación con la de otras
              personas.
            </li>
            <li>
              "Tienes que ser positivo/a" como única respuesta ante su malestar.
            </li>
            <li>"Yo conocí a alguien que..." con desenlaces negativos.</li>
            <li>Minimizar lo que siente o apurarlo a "superarlo pronto".</li>
            <li>
              Evitar por completo el tema, como si no estuviera pasando nada.
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!--  RESPIRACIÓN GUIADA  -->
    <div class="breathing-section">
      <h2>Un momento para respirar</h2>
      <p class="sub">
        Ejercicio simple de respiración para reducir la ansiedad en momentos
        difíciles
      </p>
      <div class="breathing-circle-wrap">
        <div class="breathing-circle">Inhala... Sostén... Exhala</div>
      </div>
      <div class="breathing-steps">
        <div class="breathing-step">
          <strong>1. Inhala</strong>
          Cuenta hasta 4 mientras el aire entra lentamente por la nariz.
        </div>
        <div class="breathing-step">
          <strong>2. Sostén</strong>
          Mantén el aire dentro contando hasta 4, sin forzar.
        </div>
        <div class="breathing-step">
          <strong>3. Exhala</strong>
          Suelta el aire despacio por la boca contando hasta 6.
        </div>
        <div class="breathing-step">
          <strong>4. Repite</strong>
          Realiza el ciclo de 4 a 6 veces, a tu propio ritmo.
        </div>
      </div>
    </div>

    <!-- ETAPAS EMOCIONALES  -->
    <div class="stages-section">
      <h2>Etapas emocionales frecuentes</h2>
      <p class="sub">
        No todas las personas pasan por estas etapas, ni en este orden, ni con
        la misma intensidad. Conocerlas solo ayuda a entender que lo que se
        siente es válido.
      </p>
      <div class="stages-row">
        <div class="stage-card">
          <span class="stage-emoji">😶</span>
          <h4>Negación</h4>
          <p>Dificultad inicial para asimilar la noticia del diagnóstico.</p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">😠</span>
          <h4>Enojo</h4>
          <p>
            Frustración o rabia ante la situación, a veces dirigida hacia uno
            mismo o el entorno.
          </p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">🤝</span>
          <h4>Negociación</h4>
          <p>
            Búsqueda de sentido, promesas internas o pensamientos de "si tan
            solo...".
          </p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">😔</span>
          <h4>Tristeza</h4>
          <p>Momentos de desánimo profundo al procesar la nueva realidad.</p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">🌤️</span>
          <h4>Aceptación</h4>
          <p>
            Adaptación progresiva que permite enfocar energía en el proceso y el
            bienestar diario.
          </p>
        </div>
      </div>
    </div>

    <!--  LÍNEAS DE AYUDA -->
    <div class="helplines-section">
      <h2>Líneas de ayuda en El Salvador</h2>
      <p class="sub">
        Atención psicológica gratuita y confidencial, disponible para toda la
        población
      </p>
      <div class="helplines-grid">
        <div class="helpline-card">
          <h4>#TeEscucho – ISSS</h4>
          <span class="phone">7071-1302</span>
          <p>
            Línea gratuita de atención psicológica y psiquiátrica, disponible
            las 24 horas, los 7 días de la semana, para toda la población
            salvadoreña.
          </p>
        </div>
        <div class="helpline-card">
          <h4>FOSALUD</h4>
          <span class="phone">2528-9700</span>
          <p>
            Atención en salud mental para jóvenes y adultos, con terapias
            individuales o de pareja. También disponible por WhatsApp al
            7556-5757.
          </p>
        </div>
        <div class="helpline-card">
          <h4>Cruz Roja Salvadoreña</h4>
          <span class="phone">Unidad de Atención Psicosocial</span>
          <p>
            Intervención gratuita y personalizada ante situaciones de estrés,
            ansiedad, tristeza profunda u otras crisis emocionales.
          </p>
        </div>
      </div>
      <p class="helplines-note">
        Si tú o alguien cercano está teniendo pensamientos de hacerse daño,
        busca ayuda de inmediato llamando a una de estas líneas o al
        <strong>911</strong>. No tienes que atravesar esto en soledad.
      </p>
    </div>

    <!-- PIE DE PÁGINA -->
    <footer>
      <div class="footer-container">
        <div class="footer-content">
          <div class="footer-col">
            <h2 class="Title">DERECHOS DE AUTOR</h2>
            <ul class="Advice">
              <li>&copy; Canrisk 2026</li>
              <li>&copy; Todos los derechos reservados al equipo de Canrisk</li>
              <li>Agradecimientos especiales al equipo de Canrisk</li>
              <li>que han hecho esta pagina algo posible.</li>
            </ul>
          </div>
          <div class="footer-col">
            <h2 class="Title_1">INFORMACIÓN IMPORTANTE</h2>
            <ul class="Advice_1">
              <li>
                Esta pagina NO reemplaza la ayuda de un profesional medico.
              </li>
              <li>
                En caso de tener algun tipo de emergencia o un sintoma puede
              </li>
              <li>
                apoyarse en los diferentes números de hospitales que nosotros
              </li>
              <li>proporcionamos, o llame directamente al 911.</li>
            </ul>
          </div>
        </div>
        <div class="footer-social">
          <h2 class="Title_2">Redes sociales de Canrisk!</h2>
          <ul class="Social">
            <li>
              <a href="https://www.instagram.com/canrisk/" target="_blank"
                ><img
                  src="../../MULTIMEDIA/instagram.png"
                  class="Inst-IMG"
                  alt="Instagram logo"
                />
                <p class="Inst-txt">Instagram</p></a
              >
            </li>
            <li>
              <a
                href="https://www.facebook.com/Canrisk-110882646091155"
                target="_blank"
                ><img
                  src="../../MULTIMEDIA/facebook.png"
                  class="Face-IMG"
                  alt="Facebook logo"
                />
                <p class="Face-txt">Facebook</p></a
              >
            </li>
            <li>
              <a href="https://twitter.com/Canrisk1" target="_blank"
                ><img
                  src="../../MULTIMEDIA/gorjeo.png"
                  class="Twit-IMG"
                  alt="Twitter"
                />
                <p class="Twit-txt">Twitter</p></a
              >
            </li>
          </ul>
        </div>
      </div>
    </footer>

    <script>
      const btn = document.getElementById("hamburgerBtn");
      const nav = document.getElementById("mainNav");

      btn.addEventListener("click", () => {
        const isOpen = nav.classList.toggle("open");
        btn.classList.toggle("open", isOpen);
        btn.setAttribute("aria-expanded", isOpen);
      });

      const sidebarBtn = document.getElementById("sidebarBtn");
      const sidebarMenu = document.getElementById("sidebarMenu");
      const menuOverlay = document.getElementById("menuOverlay");

      const toggleSidebar = () => {
        const isOpen = sidebarMenu.classList.toggle("open");
        sidebarBtn.classList.toggle("open", isOpen);
        menuOverlay.classList.toggle("show", isOpen);
      };

      sidebarBtn.addEventListener("click", toggleSidebar);
      menuOverlay.addEventListener("click", toggleSidebar);
    </script>

    <script src="../../JS/site.js" defer></script>
  </body>
</html>
