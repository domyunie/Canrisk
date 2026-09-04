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
    <title>Introducción al Cáncer - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/cancer.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <!-- LOGO Y BOTÓN DEL MENÚ LATERAL -->
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

    <!-- MENÚ LATERAL (SIDEBAR) -->
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

    <!-- ENCABEZADO DE LA PÁGINA -->
    <div class="Titulos">
      <h1>Introducción al Cáncer</h1>
    </div>
    <br />

    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            El cáncer no es una única enfermedad, sino un término amplio
            utilizado para describir a un grupo de más de 200 enfermedades
            diferentes caracterizadas por el crecimiento descontrolado y la
            propagación de células anormales en el cuerpo. Si este proceso no se
            controla o se detecta a tiempo, puede comprometer el funcionamiento
            de órganos vitales y extenderse a otras partes del cuerpo.
          </p>
          <br />
          <p>
            Comprender las bases del desarrollo celular, los factores de riesgo
            y la importancia del diagnóstico precoz es el primer paso
            fundamental para la prevención, el acompañamiento integral de los
            pacientes y la reducción de riesgos asociados.
          </p>
        </div>
      </div>

      <div class="IMG">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img
                src="../../MULTIMEDIA/cancer img 1.webp"
                alt="Concepto de células"
                class="IMG-TXT"
              />
            </div>
            <div class="flip-card-back">
              <span class="flip-icon">🎗️</span>
              <p>
                A nivel mundial, el cáncer es responsable de cerca de 1 de cada
                6 muertes, pero la detección temprana y el acceso a tratamiento
                aumentan notablemente la supervivencia.
              </p>
            </div>
          </div>
          <span class="flip-hint"
            >Pasa el mouse sobre la imagen para ver un dato rápido</span
          >
        </div>
      </div>
    </div>

    <!-- DATOS RÁPIDOS -->
    <div class="quick-stats">
      <div class="stat-box">
        <span class="stat-icon">🧬</span>
        <span class="stat-number">200+</span>
        <span class="stat-label"
          >enfermedades agrupadas bajo el término "cáncer"</span
        >
      </div>
      <div class="stat-box">
        <span class="stat-icon">🌍</span>
        <span class="stat-number">1 de 6</span>
        <span class="stat-label"
          >muertes en el mundo están relacionadas con el cáncer</span
        >
      </div>
      <div class="stat-box">
        <span class="stat-icon">🩺</span>
        <span class="stat-number">↑</span>
        <span class="stat-label"
          >supervivencia con detección y tratamiento oportuno</span
        >
      </div>
    </div>

    <!-- TARJETAS ORGANIZADAS EN 2 FILAS DE 3 COLUMNAS -->
    <div class="info-grid" style="display: grid !important; grid-template-columns: repeat(3, 1fr) !important; gap: 20px;">
      <div class="info-card">
        <h3>¿Cómo se origina?</h3>
        <p>
          Comienza cuando los mecanismos de control del ADN celular sufren
          mutaciones. En lugar de envejecer y morir, estas células dañadas
          sobreviven y continúan dividiéndose sin freno, pudiendo llegar a
          formar masas llamadas tumores.
        </p>
      </div>

      <div class="info-card">
        <h3>Prevención</h3>
        <p>
          Muchos tipos de cáncer se pueden prevenir o mitigar adoptando hábitos
          saludables: mantener una alimentación balanceada, evitar el consumo de
          tabaco y alcohol, proteger la piel del sol y realizar actividad física
          diaria.
        </p>
      </div>

      <div class="info-card">
        <h3>Detección Temprana</h3>
        <p>
          Identificar anomalías en etapas tempranas mediante autoexploraciones,
          mamografías o chequeos rutinarios incrementa significativamente la
          efectividad de los tratamientos médicos actuales.
        </p>
      </div>

      <div class="info-card">
        <h3>Tratamientos Comunes</h3>
        <p>
          Dependiendo del tipo y etapa del diagnóstico, los tratamientos varían
          e incluyen enfoques como la cirugía, quimioterapia, radioterapia,
          inmunoterapia y terapias dirigidas, enfocadas en frenar o erradicar
          las células afectadas.
        </p>
      </div>

      <div class="info-card">
        <h3>Factores de Riesgo</h3>
        <p>
          Existen factores que aumentan la probabilidad de desarrollar cáncer,
          como el historial familiar, la exposición a sustancias cancerígenas,
          infecciones virales persistentes, la edad avanzada y ciertos estilos
          de vida poco saludables.
        </p>
      </div>

      <div class="info-card">
        <h3>Tipos Más Comunes</h3>
        <p>
          Entre los tipos de cáncer con mayor incidencia se encuentran el de
          mama, próstata, pulmón, colorrectal y de piel. Cada uno presenta
          síntomas, factores de riesgo y protocolos de detección particulares.
        </p>
      </div>
    </div>

    <!-- SEÑALES DE ALERTA -->
    <div class="Titulos">
      <h1>Señales de Alerta</h1>
    </div>
    <br />

    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            Reconocer a tiempo las señales que el cuerpo envía puede ser
            determinante para un diagnóstico oportuno. Ningún síntoma aislado
            confirma por sí solo la presencia de cáncer, pero su persistencia
            amerita siempre una consulta médica.
          </p>
          <br />
          <ul>
            <li>Bultos o masas palpables que no desaparecen con el tiempo.</li>
            <li>
              Cambios notorios en lunares, manchas o en el color de la piel.
            </li>
            <li>Pérdida de peso inexplicable y fatiga persistente.</li>
            <li>Sangrado o secreciones anormales fuera de lo habitual.</li>
            <li>Tos persistente, ronquera o dificultad para tragar.</li>
            <li>Cambios en los hábitos intestinales o urinarios.</li>
          </ul>
        </div>
      </div>

      <div class="IMG">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img
                src="../../MULTIMEDIA/chequeomedico.jpg"
                alt="Chequeo médico"
                class="IMG-TXT"
              />
            </div>
            <div class="flip-card-back">
              <p>
                Si alguna señal persiste por más de dos semanas, no esperes:
                agenda una cita con un profesional de la salud. Un diagnóstico a
                tiempo cambia por completo el pronóstico.
              </p>
            </div>
          </div>
          <span class="flip-hint"
            >Pasa el mouse sobre la imagen para ver un consejo</span
          >
        </div>
      </div>
    </div>

    <div class="quick-stats">
      <div class="stat-box">
        <span class="stat-icon">⏱️</span>
        <span class="stat-number">2+ semanas</span>
        <span class="stat-label"
          >de un síntoma persistente ya amerita consulta médica</span
        >
      </div>
      <div class="stat-box">
        <span class="stat-icon">📅</span>
        <span class="stat-number">1 al año</span>
        <span class="stat-label"
          >chequeo preventivo recomendado según tu edad y riesgo</span
        >
      </div>
      <div class="stat-box">
        <span class="stat-icon">🗣️</span>
        <span class="stat-number">100%</span>
        <span class="stat-label"
          >de los casos se benefician de hablarlo abiertamente con un
          médico</span
        >
      </div>
    </div>

    <!-- MITOS Y REALIDADES -->
    <div class="Titulos">
      <h1>Mitos y Realidades</h1>
    </div>
    <br />

    <div
      class="info-grid"
      style="display: grid !important; grid-template-columns: repeat(2, 1fr) !important; gap: 20px;"
    >
      <div class="info-card">
        <h3>Mito: El cáncer siempre es hereditario</h3>
        <p>
          Realidad: Solo entre un 5% y un 10% de los casos se relacionan
          directamente con mutaciones genéticas heredadas; la mayoría se debe a
          factores ambientales y de estilo de vida.
        </p>
      </div>

      <div class="info-card">
        <h3>Mito: El azúcar alimenta directamente al cáncer</h3>
        <p>
          Realidad: Todas las células, sanas o cancerosas, necesitan glucosa
          para funcionar. Eliminar el azúcar no cura ni previene la enfermedad
          por sí solo.
        </p>
      </div>

      <div class="info-card">
        <h3>Mito: Si no hay síntomas, no hay riesgo</h3>
        <p>
          Realidad: Muchos tipos de cáncer son asintomáticos en etapas
          tempranas, por lo que los chequeos preventivos son esenciales incluso
          sin señales visibles.
        </p>
      </div>

      <div class="info-card">
        <h3>Mito: El cáncer es siempre una sentencia de muerte</h3>
        <p>
          Realidad: Gracias a los avances médicos, muchos tipos de cáncer
          detectados a tiempo tienen altas tasas de supervivencia y opciones de
          tratamiento efectivas.
        </p>
      </div>
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