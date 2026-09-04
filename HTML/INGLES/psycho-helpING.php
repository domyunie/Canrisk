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
    <title>psychological Help- Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/psycho-help.css" />
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
    <!--  PAGE HEADER  -->
    <div class="Titulos">
      <h1>Psychological Support</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            A diagnosis of a high-impact illness such as cancer profoundly
            disrupts the emotional stability of patients and their families. The
            psychological impact can give rise to feelings of uncertainty, fear,
            frustration, and constant isolation.
          </p>
          <br />
          <p>
            Navigating this process requires specialized therapeutic support
            that validates emotions, offers practical resilience tools, and
            fosters a safe, supportive environment where the patient does not
            feel alone during their adjustment process.
          </p>
        </div>
      </div>

      <div class="IMG">
        <img
          src="../../MULTIMEDIA/cancer psico.jpg"
          alt="Professional support and empathy"
          class="IMG-TXT"
        />
      </div>
    </div>

    <div class="info-grid">
      <div class="info-card">
        <h3>Professional Guidance</h3>
        <p>
          Psycho-oncology therapy assists patients in managing the anxiety,
          fear, and depression that arise following a diagnosis, promoting a
          better quality of life and strengthening mental health during
          treatment.
        </p>
      </div>

      <div class="info-card">
        <h3>Family Support</h3>
        <p>
          Close family members also face an overwhelming emotional burden. Joint
          sessions guide the family in fostering emotional communication,
          empathy, mutual care, and the collective management of daily stress.
        </p>
      </div>

      <div class="info-card">
        <h3>Support Groups</h3>
        <p>
          Sharing experiences with others facing similar situations alleviates
          feelings of loneliness, reduces isolation, and fosters a mutual
          exchange of optimism and effective coping strategies.
        </p>
      </div>

      <div class="info-card">
        <h3>Relaxation Techniques</h3>
        <p>
          Learning practical exercises in meditation, guided breathing, and
          emotional regulation helps reduce physical and mental tension,
          gradually restoring a sense of control in the face of daily
          challenges.
        </p>
      </div>
    </div>

    <!-- HELPFUL / AVOIDABLE PHRASES -->
    <div class="phrases-section">
      <h2>How to offer support through words</h2>
      <p class="sub">
        A guide for family and friends: small changes in language can make a big
        difference
      </p>
      <div class="phrases-columns">
        <div class="phrases-col do">
          <h3>Phrases that often help</h3>
          <ul>
            <li>"I’m here for you, whatever you need."</li>
            <li>"You don’t have to be strong all the time around me."</li>
            <li>
              "How are you feeling today?" (and listening without rushing the
              answer)
            </li>
            <li>
              "Tell me what you need, and I’ll take care of organizing it."
            </li>
            <li>"I don’t know exactly what to say, but I’m here with you."</li>
          </ul>
        </div>
        <div class="phrases-col dont">
          <h3>Phrases to avoid</h3>
          <ul>
            <li>
              "Everything happens for a reason" or comparing their situation to
              others'.
            </li>
            <li>
              "You need to be positive" as the only response to their distress.
            </li>
            <li>"I knew someone who..." involving negative outcomes.</li>
            <li>
              Minimizing their feelings or rushing them to "get over it soon."
            </li>
            <li>
              Avoiding the subject entirely, as if nothing were happening.
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!--  GUIDED BREATHING  -->
    <div class="breathing-section">
      <h2>A moment to breathe</h2>
      <p class="sub">
        A simple breathing exercise to reduce anxiety during difficult times
      </p>
      <div class="breathing-circle-wrap">
        <div class="breathing-circle">Inhale... Hold... Exhale</div>
      </div>
      <div class="breathing-steps">
        <div class="breathing-step">
          <strong>1. Inhale</strong>
          Count to 4 as air slowly enters through your nose.
        </div>
        <div class="breathing-step">
          <strong>2. Hold</strong>
          Hold your breath while counting to 4, without straining.
        </div>
        <div class="breathing-step">
          <strong>3. Exhale</strong>
          Slowly release the air through your mouth while counting to 6.
        </div>
        <div class="breathing-step">
          <strong>4. Repeat</strong>
          Perform the cycle 4 to 6 times, at your own pace.
        </div>
      </div>
    </div>

    <!-- EMOTIONAL STAGES  -->
    <div class="stages-section">
      <h2>Common emotional stages</h2>
      <p class="sub">
        Not everyone goes through these stages, nor in this specific order or
        with the same intensity. Knowing about them simply helps validate the
        feelings you are experiencing.
      </p>
      <div class="stages-row">
        <div class="stage-card">
          <span class="stage-emoji">😶</span>
          <h4>Denial</h4>
          <p>Initial difficulty processing the news of the diagnosis.</p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">😠</span>
          <h4>Anger</h4>
          <p>
            Frustration or rage regarding the situation, sometimes directed at
            oneself or those around them.
          </p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">🤝</span>
          <h4>Bargaining</h4>
          <p>
            Seeking meaning, making internal promises, or thoughts of "if
            only..."
          </p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">😔</span>
          <h4>Sadness</h4>
          <p>
            Moments of deep discouragement while processing the new reality.
          </p>
        </div>
        <div class="stage-card">
          <span class="stage-emoji">🌤️</span>
          <h4>Acceptance</h4>
          <p>
            Gradual adaptation that allows energy to be focused on the process
            and daily well-being.
          </p>
        </div>
      </div>
    </div>

    <!-- HELPLINES -->
    <div class="helplines-section">
      <h2>Helplines in El Salvador</h2>
      <p class="sub">
        Free and confidential psychological support, available to the general
        public
      </p>
      <div class="helplines-grid">
        <div class="helpline-card">
          <h4>#TeEscucho – ISSS</h4>
          <span class="phone">7071-1302</span>
          <p>
            Free psychological and psychiatric support line, available 24/7 for
            the entire Salvadoran population.
          </p>
        </div>
        <div class="helpline-card">
          <h4>FOSALUD</h4>
          <span class="phone">2528-9700</span>
          <p>
            Mental health care for youth and adults, offering individual or
            couples therapy. Also available via WhatsApp at 7556-5757.
          </p>
        </div>
        <div class="helpline-card">
          <h4>Salvadoran Red Cross</h4>
          <span class="phone">Psychosocial Support Unit</span>
          <p>
            Free, personalized intervention for situations involving stress,
            anxiety, deep sadness, or other emotional crises.
          </p>
        </div>
      </div>
      <p class="helplines-note">
        If you or someone close to you is having thoughts of self-harm, seek
        help immediately by calling one of these lines or <strong>911</strong>.
        You do not have to go through this alone.
      </p>
    </div>

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
