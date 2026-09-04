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
    <title>Introduction to Cancer - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/cancer.css" />
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

    <!-- TOP NAVIGATION BAR -->
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

    <!-- PAGE HEADER  -->
    <div class="Titulos">
      <h1>Introduction to Cancer</h1>
    </div>
    <br />

    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            Cancer is not a single disease but a broad term used to describe a
            group of more than 200 different diseases characterized by the
            uncontrolled growth and spread of abnormal cells in the body. If
            this process is not controlled or detected in time, it can
            compromise the function of vital organs and spread to other parts of
            the body.
          </p>
          <br />
          <p>
            Understanding the basics of cell development, risk factors, and the
            importance of early diagnosis is the essential first step toward
            prevention, comprehensive patient support, and reducing associated
            risks.
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
                Worldwide, cancer is responsible for about 1 in 6 deaths, but
                early detection and access to treatment significantly increase
                survival.
              </p>
            </div>
          </div>
          <span class="flip-hint">Hover over the image for a quick fact</span>
        </div>
      </div>
    </div>

    <!--  QUICK FACTS  -->
    <div class="quick-stats">
      <div class="stat-box">
        <span class="stat-icon">🧬</span>
        <span class="stat-number">200+</span>
        <span class="stat-label">diseases grouped under the term "cancer"</span>
      </div>
      <div class="stat-box">
        <span class="stat-icon">🌍</span>
        <span class="stat-number">1 in 6</span>
        <span class="stat-label">deaths worldwide are related to cancer</span>
      </div>
      <div class="stat-box">
        <span class="stat-icon">🩺</span>
        <span class="stat-number">↑</span>
        <span class="stat-label"
          >survival with timely detection and treatment</span
        >
      </div>
    </div>

    <div class="info-grid">
      <div class="info-card">
        <h3>How Does It Start?</h3>
        <p>
          It begins when the control mechanisms of cellular DNA undergo
          mutations. Instead of aging and dying, these damaged cells survive and
          keep dividing without restraint, potentially forming masses called
          tumors.
        </p>
      </div>

      <div class="info-card">
        <h3>Prevention</h3>
        <p>
          Many types of cancer can be prevented or reduced by adopting healthy
          habits: eating a balanced diet, avoiding tobacco and alcohol use,
          protecting your skin from the sun, and getting daily physical
          activity.
        </p>
      </div>

      <div class="info-card">
        <h3>Early Detection</h3>
        <p>
          Identifying abnormalities at early stages through self-exams,
          mammograms, or routine check-ups significantly increases the
          effectiveness of current medical treatments.
        </p>
      </div>

      <div class="info-card">
        <h3>Common Treatments</h3>
        <p>
          Depending on the type and stage of the diagnosis, treatments vary and
          include approaches such as surgery, chemotherapy, radiation therapy,
          immunotherapy, and targeted therapies, all aimed at slowing or
          eliminating affected cells.
        </p>
      </div>

      <div class="info-card">
        <h3>Risk Factors</h3>
        <p>
          Certain factors increase the likelihood of developing cancer, such as
          family history, exposure to carcinogenic substances, persistent viral
          infections, advanced age, and certain unhealthy lifestyle habits.
        </p>
      </div>

      <div class="info-card">
        <h3>Most Common Types</h3>
        <p>
          Among the most common types of cancer are breast, prostate, lung,
          colorectal, and skin cancer. Each presents its own symptoms, risk
          factors, and detection protocols.
        </p>
      </div>
    </div>

    <!--  WARNING SIGNS -->
    <div class="Titulos">
      <h1>Warning Signs</h1>
    </div>
    <br />

    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            Recognizing the signs the body sends in time can be decisive for a
            timely diagnosis. No single symptom on its own confirms the presence
            of cancer, but persistence always warrants a medical consultation.
          </p>
          <br />
          <ul>
            <li>Lumps or palpable masses that don't go away over time.</li>
            <li>Noticeable changes in moles, spots, or skin color.</li>
            <li>Unexplained weight loss and persistent fatigue.</li>
            <li>Abnormal bleeding or discharge outside the usual.</li>
            <li>Persistent cough, hoarseness, or difficulty swallowing.</li>
            <li>Changes in bowel or urinary habits.</li>
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
                If any sign persists for more than two weeks, don't wait:
                schedule an appointment with a healthcare professional. A timely
                diagnosis completely changes the outlook.
              </p>
            </div>
          </div>
          <span class="flip-hint">Hover over the image for a tip</span>
        </div>
      </div>
    </div>

    <div class="quick-stats">
      <div class="stat-box">
        <span class="stat-icon">⏱️</span>
        <span class="stat-number">2+ weeks</span>
        <span class="stat-label"
          >of a persistent symptom already warrants a medical visit</span
        >
      </div>
      <div class="stat-box">
        <span class="stat-icon">📅</span>
        <span class="stat-number">1 per year</span>
        <span class="stat-label"
          >preventive check-up recommended based on your age and risk</span
        >
      </div>
      <div class="stat-box">
        <span class="stat-icon">🗣️</span>
        <span class="stat-number">100%</span>
        <span class="stat-label"
          >of cases benefit from talking openly with a doctor</span
        >
      </div>
    </div>

    <!--  MYTHS AND FACTS  -->
    <div class="Titulos">
      <h1>Myths and Facts</h1>
    </div>
    <br />

    <div
      class="info-grid"
      style="grid-template-columns: repeat(2, 1fr) !important"
    >
      <div class="info-card">
        <h3>Myth: Cancer is always hereditary</h3>
        <p>
          Fact: Only 5% to 10% of cases are directly linked to inherited genetic
          mutations; most cases are due to environmental and lifestyle factors.
        </p>
      </div>

      <div class="info-card">
        <h3>Myth: Sugar directly feeds cancer</h3>
        <p>
          Fact: All cells, healthy or cancerous, need glucose to function.
          Cutting out sugar does not cure or prevent the disease on its own.
        </p>
      </div>

      <div class="info-card">
        <h3>Myth: No symptoms means no risk</h3>
        <p>
          Fact: Many types of cancer are asymptomatic in early stages, which is
          why preventive check-ups are essential even without visible signs.
        </p>
      </div>

      <div class="info-card">
        <h3>Myth: Cancer is always a death sentence</h3>
        <p>
          Fact: Thanks to medical advances, many types of cancer detected early
          have high survival rates and effective treatment options.
        </p>
      </div>
    </div>

    <!--  FOOTER  -->
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
