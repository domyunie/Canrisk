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
    <title>Quiz - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/quizz.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <!--  LOGO AND SIDEBAR TOGGLE BUTTON -->
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

    <!--SIDEBAR MENU -->
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

    <!-- SIDEBAR DARK OVERLAY -->
    <div class="overlay-menu" id="menuOverlay"></div>

    <!-- TOP NAVIGATION BAR  -->
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
    <!-- ===== ENCABEZADO DE LA PÁGINA ===== -->
    <div class="Titulos">
      <h1>Awareness Questionnaire</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            How much do we really know about cancer? This questionnaire aims to
            assess the community's level of information and general
            understanding about the disease, its definitions, and key
            preventative habits.
          </p>
          <br />
          <p>
            Your participation helps us identify critical areas where greater
            dissemination of educational content is needed, understand people's
            relationship with medical checkups, and strengthen collective
            empathy.
          </p>
        </div>
      </div>

      <div class="IMG">
        <img
          src="../../MULTIMEDIA/cancer img.2.jpe"
          alt="Evaluación de conocimiento sobre el cáncer"
          class="IMG-TXT"
        />
      </div>
    </div>

    <div class="action-container">
      <a
        href="https://docs.google.com/forms/d/e/1FAIpQLSeA_wRqpODvoCKK3eUJ1uvN3IjVLjKseehsvB1lB7wfm2d04A/viewform?usp=publish-editor"
        target="_blank"
        class="btn-quizz"
      >
        Answer the questionnaire in Google Forms &rarr;
      </a>
    </div>

    <div class="info-grid">
      <div class="info-card">
        <h3>Concept and Real Knowledge</h3>
        <p>
          What does cancer mean to you? We analyze your self-perception of the
          disease, measuring whether you consider yourself poorly, moderately,
          or well-informed about its implications.
        </p>
      </div>

      <div class="info-card">
        <h3>Prevention and Medical Routine</h3>
        <p>
          Prevention saves lives. We record how often people get regular medical
          checkups to assess their level of proactivity in healthcare.
        </p>
      </div>

      <div class="info-card">
        <h3>Hospital Environment and Interest</h3>
        <p>
          We assess whether users are familiar with medical centers specializing
          in cancer treatments and measure their interest in continuing to seek
          information to support their loved ones.
        </p>
      </div>

      <div class="info-card">
        <h3>Empathy and Support</h3>
        <p>
          We seek to understand the human and social perspective of the process,
          analyzing the individual's willingness to accompany, visit, and
          understand the daily life of a patient in treatment.
        </p>
      </div>
    </div>

    <!-- ===== SECCIÓN DE DATOS DE CONCIENTIZACIÓN ===== -->
    <section class="awareness-banner">
      <div class="awareness-header">
        <h2>Why is it vital to be informed?</h2>
        <p>
          Misinformation remains one of the main barriers to early detection and
          effective support.
        </p>
      </div>

      <div class="stats-grid">
        <div class="stat-box">
          <div class="stat-number">30% - 50%</div>
          <h4>Preventable Cases</h4>
          <p>
            Between one-third and one-half of all cancer cases can be prevented
            by adopting healthy lifestyles and avoiding known risk factors.
          </p>
        </div>

        <div class="stat-box">
          <div class="stat-number">Early Detection</div>
          <h4>Greater Effectiveness</h4>
          <p>
            Identifying the disease in its early stages significantly increases
            the chances of successful treatment and recovery.
          </p>
        </div>

        <div class="stat-box">
          <div class="stat-number">Support Network</div>
          <h4>Emotional Impact</h4>
          <p>
            Having a well-informed family and community support network
            significantly reduces stress and anxiety during the patient's
            journey.
          </p>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer>
      <div class="footer-container">
        <div class="footer-content">
          <div class="footer-col">
            <h2 class="Title">COPYRIGHT</h2>
            <ul class="Advice">
              <li>&copy; Canrisk 2026</li>
              <li>&copy; All rights reserved to the Canrisk team</li>
              <li>Special thanks to the Canrisk team</li>
              <li>who have made this page possible.</li>
            </ul>
          </div>
          <div class="footer-col">
            <h2 class="Title_1">IMPORTANT INFORMATION</h2>
            <ul class="Advice_1">
              <li>
                This page DOES NOT replace the help of a medical professional.
              </li>
              <li>
                In case you have any type of emergency or a symptom you can
              </li>
              <li>rely on the different numbers of hospitals that we</li>
              <li>we provide, or call 911 directly.</li>
            </ul>
          </div>
        </div>
        <div class="footer-social">
          <h2 class="Title_2">Canrisk social networks!</h2>
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
