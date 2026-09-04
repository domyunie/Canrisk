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
    <title>Donar - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/donar.css" />
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
          <a href="../ESPANOL/aboutus.php">
            <h4>Sobre nosotros</h4>
          </a>
        </li>

        <li class="box-II">
          <a href="../ESPANOL/Contacto.php">
            <h4>Contáctanos</h4>
          </a>
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

    <div class="donation-wrapper">
      <a
        id="backLink"
        href="../../HTML/ESPANOL/help-detalle.php"
        class="detalle-volver"
      >
        &larr; Volver
      </a>

      <div class="donation-card">
        <div id="formContainer">
          <h1>Realizar una Donación</h1>

          <div class="beneficiary-info" id="beneficiaryBox">
            Cargando información del beneficiario...
          </div>

          <form id="donationForm">
            <div class="form-group">
              <label>Monto a donar ($ USD)</label>

              <div class="amount-presets">
                <button
                  type="button"
                  class="preset-btn"
                  onclick="setAmount(5, this)"
                >
                  $5
                </button>

                <button
                  type="button"
                  class="preset-btn"
                  onclick="setAmount(10, this)"
                >
                  $10
                </button>

                <button
                  type="button"
                  class="preset-btn"
                  onclick="setAmount(25, this)"
                >
                  $25
                </button>

                <button
                  type="button"
                  class="preset-btn"
                  onclick="setAmount(50, this)"
                >
                  $50
                </button>
              </div>

              <input
                type="number"
                id="monto"
                min="1"
                step="any"
                placeholder="Ingresa un monto personalizado"
                required
              />
            </div>

            <div class="form-group">
              <label for="nombre">Nombre completo</label>

              <input
                type="text"
                id="nombre"
                placeholder="Nombre y Apellido"
                required
              />
            </div>

            <div class="form-group">
              <label for="email">Correo electrónico</label>

              <input
                type="email"
                id="email"
                placeholder="ejemplo@correo.com"
                required
              />
            </div>

            <div class="form-group">
              <label for="tarjeta">Número de tarjeta</label>

              <input
                type="text"
                id="tarjeta"
                maxlength="19"
                placeholder="0000 0000 0000 0000"
                required
              />
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="exp">Expiración</label>

                <input
                  type="text"
                  id="exp"
                  placeholder="MM/AA"
                  maxlength="5"
                  required
                />
              </div>

              <div class="form-group">
                <label for="cvv">CVV</label>

                <input
                  type="password"
                  id="cvv"
                  maxlength="4"
                  placeholder="123"
                  required
                />
              </div>
            </div>

            <button type="submit" class="btn-donar-submit">
              Completar Donación
            </button>
          </form>
        </div>

        <!-- Confirmación -->
        <div class="success-message" id="successBox">
          <h2>¡Muchas gracias por tu apoyo!</h2>

          <p>
            Tu donación ha sido recibida exitosamente. Cada aporte ayuda a
            cambiar una vida.
          </p>

          <br />

          <a
            id="returnLink"
            href="../ESPANOL/help-detalle.php"
            class="btn-donar-submit"
          >
            Volver a la ficha
          </a>
        </div>
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
              <a href="https://www.instagram.com/canrisk/" target="_blank">
                <img
                  src="../../MULTIMEDIA/instagram.png"
                  class="Inst-IMG"
                  alt="Instagram logo"
                />
                <p class="Inst-txt">Instagram</p>
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
                <p class="Face-txt">Facebook</p>
              </a>
            </li>

            <li>
              <a href="https://twitter.com/Canrisk1" target="_blank">
                <img
                  src="../../MULTIMEDIA/gorjeo.png"
                  class="Twit-IMG"
                  alt="Twitter"
                />
                <p class="Twit-txt">Twitter</p>
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
    </script>

    <script src="../../JS/personasdata.js"></script>

    <script>
      const params = new URLSearchParams(window.location.search);
      const id = parseInt(params.get("id"));

      let personas =
        JSON.parse(localStorage.getItem("personasAyudaData")) || personasAyuda;

      const persona = personas.find((p) => p.id === id);

      const beneficiaryBox = document.getElementById("beneficiaryBox");

      const formContainer = document.getElementById("formContainer");

      const successBox = document.getElementById("successBox");

      const returnLink = document.getElementById("returnLink");

      const backLink = document.getElementById("backLink");

      if (persona) {
        beneficiaryBox.innerHTML = `Estás donando a la causa de:
                <strong>${persona.nombre}</strong>`;

        returnLink.href = `help-detalle.php?id=${persona.id}`;

        backLink.href = `help-detalle.php?id=${persona.id}`;
      } else {
        beneficiaryBox.innerHTML = `Donación general al fondo de ayuda de Canrisk.`;

        returnLink.href = `help.php`;

        backLink.href = `help.php`;
      }

      function setAmount(val, btn) {
        document.getElementById("monto").value = val;

        document
          .querySelectorAll(".preset-btn")
          .forEach((b) => b.classList.remove("active"));

        btn.classList.add("active");
      }

      document
        .getElementById("donationForm")
        .addEventListener("submit", function (e) {
          e.preventDefault();

          const montoIngresado = parseFloat(
            document.getElementById("monto").value,
          );

          if (persona && montoIngresado > 0) {
            persona.recaudado =
              (parseFloat(persona.recaudado) || 0) + montoIngresado;

            if (persona.objetivo) {
              persona.porcentaje = Math.min(
                Math.round((persona.recaudado / persona.objetivo) * 100),
                100,
              );
            }

            localStorage.setItem("personasAyudaData", JSON.stringify(personas));
          }

          formContainer.style.display = "none";
          successBox.style.display = "block";
        });
    </script>

    <script src="../../JS/site.js" defer></script>
  </body>
</html>
