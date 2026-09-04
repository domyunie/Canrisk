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
    <title>About Us - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/aboutus.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <!--  LOGO AND SIDEBAR TOGGLE BUTTON  -->
    <div class="navbar-brand">
      <button
        class="hamburger-sidebar-btn"
        id="sidebarBtn"
        aria-label="Open side menu"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>
      <h1>Canrisk</h1>
      <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" class="C-L" />
    </div>

    <!--  SIDEBAR MENU  -->
    <nav class="sidebar-menu" id="sidebarMenu">
      <div class="sidebar-decoracion">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <ul class="sidebar-list">
        <li>
          <a href="cancer-introING.php">Introduction to Cancer &rarr;</a>
        </li>
        <li><a href="CancerING.php">Cancer Types &rarr;</a></li>
        <li><a href="psycho-helpING.php">Psychological Support &rarr;</a></li>
        <li><a href="helpING.php">Help Center &rarr;</a></li>
        <li><a href="quizzING.php">Quiz &rarr;</a></li>
        <li><a href="faqING.php">Frequently Asked Questions &rarr;</a></li>
      </ul>
    </nav>

    <!--  SIDEBAR DARK OVERLAY  -->
    <div class="overlay-menu" id="menuOverlay"></div>

    <!--  TOP NAVIGATION BAR  -->
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
          <h4><a href="PrincipalING.php">Home Page</a></h4>
        </li>
        <li class="box-II">
          <a href="aboutusENG.php"><h4>About Us</h4></a>
        </li>
        <li class="box-II">
          <a href="ContactoING.php"><h4>Contact Us</h4></a>
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

    <!--  PAGE HEADER  -->
    <header class="hero-section">
      <div class="hero-container">
        <h1 class="hero-title">About Us</h1>

        <div class="hero-subtitle">
          <p>
            Canrisk is an informational website whose purpose is to inform
            society in an accessible and reliable way about the most common
            types of cancer among the Salvadoran population: breast, cervical,
            prostate, stomach, and lung cancer.
          </p>
        </div>
      </div>
    </header>

    <div class="contenedor-flex-lateral">
      <div class="bloque-tarjetas-originales">
        <div class="content-text">
          <p>
            Our project is called
            <strong class="Negrita">Canrisk</strong> because it comes from
            combining two words: cancer and <em>risk</em>. We chose that fusion
            to give the site a warm and easy-to-remember identity.
          </p>
        </div>
      </div>

      <div class="IMG">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img
                src="../../MULTIMEDIA/cancer imagen.jpg"
                alt="Equipo de Canrisk"
                class="IMG-TXT"
              />
            </div>
            <div class="flip-card-back">
              <p>
                This project was created by a team of students committed to
                bringing reliable medical information to those who need it most.
              </p>
            </div>
          </div>
          <span class="flip-hint">Hover over the image for a quick fact</span>
        </div>
      </div>
    </div>

    <section class="info-row-container">
      <h2 class="info-row-title">What moves us</h2>
      <div class="info-grid">
        <div class="info-card">
          <h3>Our mission</h3>
          <p>
            To provide clear and reliable medical information about breast and
            cervical cancer, prostate, stomach and lung to the Salvadoran
            population, without unnecessary technicalities.
          </p>
        </div>
        <div class="info-card">
          <h3>Our approach</h3>
          <p>
            Create an informative website, specializing in the area of ​​cancer,
            that allows the user to be informed about this disease, access to
            nearby hospital services, and information on available treatments
            and conduct questionnaires to learn more about this deadly disease.
          </p>
        </div>
        <div class="info-card">
          <h3>Our Commitment</h3>
          <p>
            To publish clear and verified information about the most common
            types of cancer in El Salvador, through thematic sections within the
            website, so that users can learn about and understand this disease
            and its variants in an accessible way.
          </p>
        </div>
      </div>
    </section>

    <div class="hero-container">
      <h1 class="hero-title">Our Team</h1>

      <div class="hero-subtitle">
        <p>Canrisk is a reality thanks to our team behind it.</p>
      </div>
      <div class="bloque-tarjetas-originales">
        <img
          src="../../MULTIMEDIA/Aboutus.png"
          alt="Equipo de Canrisk"
          class="IMG-TXT"
        />
      </div>
    </div>

    <!--  FOOTER -->
    <footer>
      <div class="footer-container">
        <div class="footer-content">
          <div class="footer-col">
            <h2 class="Title">COPYRIGHT</h2>
            <ul class="Advice">
              <li>&copy; Canrisk 2026</li>
              <li>
                &copy; All rights reserved to the Canrisk team. Special thanks
                to the Canrisk team who have made this page possible.
              </li>
            </ul>
          </div>
          <div class="footer-col">
            <h2 class="Title_1">IMPORTANT INFORMATION</h2>
            <ul class="Advice_1">
              <li>
                This page DOES NOT replace the help of a medical professional.
              </li>
              <li>
                In case you have any type of emergency or a symptom, you can
                rely on the different hospital numbers that we provide, or call
                911 directly.
              </li>
            </ul>
          </div>
        </div>
        <div class="footer-social">
          <h2 class="Title_2">Canrisk social networks!</h2>
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
    </script>

    <script src="../../JS/site.js" defer></script>
  </body>
</html>
