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
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/faq.css" />
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

    <!-- FONDO OSCURO AL ABRIR EL SIDEBAR  -->
    <div class="overlay-menu" id="menuOverlay"></div>

    <!-- BARRA DE NAVEGACIÓN SUPERIOR  -->
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

    <!---Preguntas -->

    <div class="Titulos">
      <h1>Preguntas Frecuentes</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            Este apartado tiene como proposito apoyar a los usuarios que tienen
            preguntas sobre el cáncer que no les han sido resueltas. Somos
            concientes que muchas personas buscan información sobre el cancer,
            pero esta aveces no puede satisfacer exitosamente algunas
            cuestionantes que poseen sobre la enfermedad, sin embargo, nosotros
            como equipo de canrisk buscamos solventar las dudas sobre esta
            enfermedad.
          </p>
        </div>
      </div>

      <div class="IMG">
        <img
          src="../../MULTIMEDIA/signodeinterrogacion.avif"
          alt="Evaluación de conocimiento sobre el cáncer"
          class="IMG-TXT"
        />
      </div>
    </div>

    <!-- PREGUNTAS FRECUENTES -->
    <div class="faq-section">
      <div class="faq-search-wrap">
        <input
          type="text"
          id="faqSearch"
          class="faq-search"
          placeholder="Busca tu pregunta aquí..."
        />
      </div>
      <p class="faq-hint">
        Escribe una palabra clave, por ejemplo "prevención" o "quimioterapia"
      </p>

      <div class="faq-category" data-category="general">
        <h2>Sobre el cáncer en general</h2>

        <details class="faq-item">
          <summary>¿Qué es exactamente el cáncer?</summary>
          <div class="faq-answer">
            Es un término general para describir enfermedades en las que algunas
            células del cuerpo se multiplican de forma descontrolada y pueden
            invadir tejidos cercanos o propagarse a otras partes del organismo.
            Existen más de 100 tipos distintos, cada uno con causas y
            comportamientos diferentes.
          </div>
        </details>

        <details class="faq-item">
          <summary>¿El cáncer siempre es hereditario?</summary>
          <div class="faq-answer">
            No. Solo una parte de los casos tiene un componente genético claro.
            La mayoría se relaciona con una combinación de factores como el
            estilo de vida, el ambiente y la edad, más que con una sola causa
            heredada.
          </div>
        </details>

        <details class="faq-item">
          <summary>¿El cáncer es contagioso?</summary>
          <div class="faq-answer">
            No, el cáncer en sí mismo no se transmite de persona a persona. Sin
            embargo, algunas infecciones que sí pueden contagiarse, como el VPH
            o la bacteria Helicobacter pylori, están asociadas a un mayor riesgo
            de desarrollar ciertos tipos de cáncer.
          </div>
        </details>

        <details class="faq-item">
          <summary>¿Todos los tumores son cancerosos?</summary>
          <div class="faq-answer">
            No. Existen tumores benignos, que no invaden otros tejidos ni se
            propagan, y tumores malignos, que sí tienen esa capacidad. Un médico
            es quien puede determinar, mediante estudios, de qué tipo se trata.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="prevencion">
        <h2>Prevención y detección</h2>

        <details class="faq-item">
          <summary>
            ¿A qué edad debo empezar a hacerme chequeos preventivos?
          </summary>
          <div class="faq-answer">
            Depende del tipo de cáncer y de los antecedentes familiares de cada
            persona. En general, muchos chequeos de rutina (como mamografías o
            colonoscopias) se recomiendan a partir de los 40-50 años, pero un
            médico puede indicar edades distintas según tu historial. Lo
            importante es no esperar a tener síntomas para consultar.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            ¿Puedo prevenir el cáncer solo con hábitos saludables?
          </summary>
          <div class="faq-answer">
            Una alimentación balanceada, actividad física regular, evitar el
            tabaco y limitar el alcohol reducen significativamente el riesgo de
            varios tipos de cáncer, pero no garantizan una prevención absoluta.
            Combinar buenos hábitos con chequeos médicos periódicos es la
            estrategia más efectiva.
          </div>
        </details>

        <details class="faq-item">
          <summary>Si no tengo síntomas, ¿igual debo hacerme exámenes?</summary>
          <div class="faq-answer">
            Sí. Muchos tipos de cáncer no presentan síntomas visibles en sus
            primeras etapas, que suelen ser las de mejor pronóstico. Por eso los
            exámenes de tamizaje están diseñados justamente para personas sin
            síntomas.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="tratamiento">
        <h2>Tratamiento</h2>

        <details class="faq-item">
          <summary>
            ¿Cuáles son los tratamientos más comunes contra el cáncer?
          </summary>
          <div class="faq-answer">
            Los más habituales son la cirugía, la quimioterapia y la
            radioterapia, aunque también existen terapias dirigidas e
            inmunoterapia. El plan de tratamiento depende del tipo de cáncer, su
            etapa y la condición general del paciente, y siempre lo define un
            equipo médico especializado.
          </div>
        </details>

        <details class="faq-item">
          <summary>¿El cáncer tiene cura?</summary>
          <div class="faq-answer">
            Muchos tipos de cáncer, especialmente cuando se detectan en etapas
            tempranas, tienen tasas de curación o remisión muy altas. El
            pronóstico varía mucho según el tipo, la etapa y la respuesta
            individual al tratamiento, por lo que es importante hablarlo
            directamente con el equipo médico tratante.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            ¿Es normal sentir mucho cansancio durante el tratamiento?
          </summary>
          <div class="faq-answer">
            Sí, la fatiga es uno de los efectos secundarios más comunes durante
            la quimioterapia y radioterapia. Es importante comunicárselo al
            equipo médico, ya que existen estrategias para ayudar a manejarla.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="apoyo">
        <h2>Apoyo emocional y familiar</h2>

        <details class="faq-item">
          <summary>
            ¿Cómo puedo ayudar a un familiar que fue diagnosticado?
          </summary>
          <div class="faq-answer">
            Escuchar sin juzgar, preguntar qué necesita en lugar de asumirlo, y
            acompañarlo en las citas médicas si lo desea, suele ser de gran
            ayuda. Visita nuestra sección de
            <a href="psycho-help.php">Apoyo Psicológico</a> para más
            orientación práctica.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            ¿Es normal sentir miedo o tristeza si me diagnosticaron cáncer?
          </summary>
          <div class="faq-answer">
            Sí, es una reacción completamente comprensible. Muchas personas
            atraviesan distintas emociones durante el proceso, y no hay una
            forma "correcta" de sentirse. Buscar apoyo psicológico especializado
            puede ayudar a procesar estas emociones de forma saludable.
          </div>
        </details>

        <details class="faq-item">
          <summary>¿Dónde puedo buscar apoyo psicológico gratuito?</summary>
          <div class="faq-answer">
            En El Salvador existen líneas gratuitas como #TeEscucho del ISSS
            (7071-1302, disponible 24/7) o FOSALUD. Puedes encontrar el detalle
            completo en nuestra sección de
            <a href="psycho-help.php">Apoyo Psicológico</a>.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="canrisk">
        <h2>Sobre Canrisk</h2>

        <details class="faq-item">
          <summary>¿Canrisk reemplaza la consulta con un médico?</summary>
          <div class="faq-answer">
            No. Canrisk es una plataforma educativa e informativa; no sustituye
            el diagnóstico, tratamiento ni la opinión de un profesional de la
            salud. Ante cualquier síntoma o duda médica, siempre recomendamos
            acudir a un especialista.
          </div>
        </details>

        <details class="faq-item">
          <summary>¿El cuestionario y mis datos son confidenciales?</summary>
          <div class="faq-answer">
            Sí, las respuestas del cuestionario son completamente anónimas y se
            utilizan únicamente con fines educativos y estadísticos para mejorar
            nuestro contenido.
          </div>
        </details>

        <details class="faq-item">
          <summary>Tengo una pregunta que no está aquí, ¿qué hago?</summary>
          <div class="faq-answer">
            Puedes enviarla mediante el formulario de Google que aparece arriba
            en esta página. El equipo de Canrisk responde en un lapso de entre 1
            y 7 días a través del correo que proporciones.
          </div>
        </details>
      </div>

      <p class="faq-no-results" id="faqNoResults">
        No encontramos preguntas que coincidan con tu búsqueda. Intenta con otra
        palabra clave.
      </p>
    </div>

    <!--Cuestionario google forms-->

    <div class="Titulos">
      <h1>¿Tienes más preguntas?</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            Mediante esta sección ofrecemos acceso a las preguntas mas
            frecuentes de nuestro sitio, y tambien brindamos la posibilidad de
            realizar preguntas en nuestro apartado de preguntas, las cuales
            seran resueltas en un lapso de tiempo de entre 1 a 7 dias, mediante
            gmail, despues de ingresar correctamente los datos personales para
            poder enviar el mensaje.
          </p>
        </div>
      </div>
    </div>

    <div class="action-container">
      <a
        href="https://docs.google.com/forms/d/e/1FAIpQLSeJ-OZBvG9wHPYXodas9Sprqf_2tUy8QWFEoFS1lofK0bX32g/viewform?pli=1"
        target="_blank"
        class="btn-quizz"
      >
        Responder Cuestionario en Google Forms &rarr;
      </a>
    </div>

    <!--  PIE DE PÁGINA -->
    <footer>
      <div class="footer-container">
        <div class="footer-content">
          <div class="footer-col">
            <h2 class="Title">DERECHOS DE AUTOR</h2>
            <ul class="Advice">
              <li>&copy; Canrisk 2026</li>
              <li>
                &copy; Todos los derechos reservados al equipo de Canrisk.
                Agradecimientos especiales al equipo de Canrisk que han hecho
                esta página algo posible.
              </li>
            </ul>
          </div>
          <div class="footer-col">
            <h2 class="Title_1">INFORMACIÓN IMPORTANTE</h2>
            <ul class="Advice_1">
              <li>
                Esta página NO reemplaza la ayuda de un profesional médico.
              </li>
              <li>
                En caso de tener algún tipo de emergencia o un síntoma puede
                apoyarse en los diferentes números de hospitales que nosotros
                proporcionamos, o llamar directamente al 911.
              </li>
            </ul>
          </div>
        </div>
        <div class="footer-social">
          <h2 class="Title_2">Redes sociales de Canrisk!</h2>
          <ul class="Social">
            <li>
              <a href="https://www.instagram.com/canrisk/" target="_blank">
                <img
                  src="../../MULTIMEDIA/instagram.png"
                  class="Inst-IMG"
                  alt="Instagram logo"
                />
                <span class="Inst-txt">Instagram</span>
              </a>
            </li>
            <li>
              <a
                href="https://www.facebook.com/Canrisk-110882646091155"
                target="_blank"
              >
                <img
                  src="../../MULTIMEDIA/facebook.png"
                  class="Face-IMG"
                  alt="Facebook logo"
                />
                <span class="Face-txt">Facebook</span>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/Canrisk1" target="_blank">
                <img
                  src="../../MULTIMEDIA/gorjeo.png"
                  class="Twit-IMG"
                  alt="Twitter"
                />
                <span class="Twit-txt">Twitter</span>
              </a>
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

      const faqSearch = document.getElementById("faqSearch");
      const faqItems = document.querySelectorAll(".faq-item");
      const faqCategories = document.querySelectorAll(".faq-category");
      const faqNoResults = document.getElementById("faqNoResults");

      faqSearch.addEventListener("input", () => {
        const query = faqSearch.value.trim().toLowerCase();
        let anyVisible = false;

        faqCategories.forEach((category) => {
          let categoryHasVisible = false;
          category.querySelectorAll(".faq-item").forEach((item) => {
            const text = item.textContent.toLowerCase();
            const matches = text.includes(query);
            item.style.display = matches ? "" : "none";
            if (matches) categoryHasVisible = true;
          });
          category.style.display = categoryHasVisible ? "" : "none";
          if (categoryHasVisible) anyVisible = true;
        });

        faqNoResults.style.display = anyVisible ? "none" : "block";
      });
    </script>

    <script src="../../JS/site.js" defer></script>
  </body>
</html>
