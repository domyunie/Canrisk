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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/help.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <div class="navbar-brand">
      <button
        class="hamburger-sidebar-btn"
        id="sidebarBtn"
        aria-label="Open sidebar menu"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>
      <h1>Canrisk</h1>
      <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" class="C-L" />
    </div>

    <nav class="sidebar-menu" id="sidebarMenu">
      <div class="sidebar-decoracion">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <ul class="sidebar-list">
        <li>
          <a href="../INGLES/cancer-introING.php"
            >Introduction to Cancer &rarr;</a
          >
        </li>
        <li><a href="../INGLES/CancerING.php">Types of Cancer &rarr;</a></li>
        <li>
          <a href="../INGLES/psycho-helpING.php"
            >Psychological Support &rarr;</a
          >
        </li>
        <li><a href="../INGLES/helpING.php">Help Center &rarr;</a></li>
        <li><a href="../INGLES/quizzING.php">Quiz &rarr;</a></li>
        <li>
          <a href="..//INGLES/faqING.php">Frequently Asked Questions &rarr;</a>
        </li>
      </ul>
    </nav>

    <div class="overlay-menu" id="menuOverlay"></div>

    <nav class="navbar" id="mainNav">
      <button
        class="hamburger"
        id="hamburgerBtn"
        aria-label="Open menu"
        aria-expanded="false"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>

      <ul class="Info-nav">
        <li class="box-II">
          <h4><a href="../INGLES/PrincipalING.php">Home</a></h4>
        </li>
        <li class="box-II">
          <a href="../INGLES/aboutusENG.php"><h4>About Us</h4></a>
        </li>
        <li class="box-II">
          <a href="../INGLES/ContactoING.php"><h4>Contact Us</h4></a>
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

    <div class="detalle-wrapper">
      <a href="Contacto.php" class="detalle-volver"
        >&larr; Back to contacts page</a
      >
      <div class="detalle-card" id="detalleCard"></div>
    </div>

    <footer>
      <div class="footer-container">
        <div class="footer-content">
          <div class="footer-col">
            <h2 class="Title">COPYRIGHT</h2>
            <ul class="Advice">
              <li>&copy; Canrisk 2026</li>
              <li>&copy; All rights reserved to the Canrisk team</li>
              <li>Special thanks to the Canrisk team</li>
              <li>who made this page possible.</li>
            </ul>
          </div>
          <div class="footer-col">
            <h2 class="Title_1">IMPORTANT INFORMATION</h2>
            <ul class="Advice_1">
              <li>This page DOES NOT replace professional medical advice.</li>
              <li>In case of an emergency or symptom, you can</li>
              <li>rely on the various hospital numbers we provide,</li>
              <li>or call 911 directly.</li>
            </ul>
          </div>
        </div>
        <div class="footer-social">
          <h2 class="Title_2">Canrisk Social Media!</h2>
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

    <script src="../../JS/hospitalesdata.js"></script>
    <script>
      const params = new URLSearchParams(window.location.search);
      const id = parseInt(params.get("id"));
      const hospital = hospitalesData.find((h) => h.id === id);
      const contenedor = document.getElementById("detalleCard");

      if (hospital) {
        contenedor.innerHTML = `
                <div class="detalle-foto">
                    <img src="${hospital.imagen}" alt="${hospital.nombre}">
                </div>
                <div class="detalle-info">
                    <h1>${hospital.nombre}</h1>
                    <p><strong>Phone:</strong> ${hospital.telefono}</p>
                    <p><strong>Location:</strong> ${hospital.ubicacion}</p>
                    <p><strong>Hours:</strong> ${hospital.horario}</p>
                    <p><strong>Description:</strong> ${hospital.descripcion}</p>
                    <p><strong>Services:</strong></p>
                    <div class="Servicios">
                        <ul>
                            ${hospital.servicios.map((servicio) => `<li>${servicio}</li>`).join("")}
                        </ul>
                    </div>
                    <p><strong>Rating:</strong> ${hospital.calificacion} / 5</p>
                </div>
            `;
      } else {
        contenedor.innerHTML = `<p>Hospital information not found.</p>`;
      }
    </script>

    <script src="../../JS/site.js" defer></script>
  </body>
</html>
