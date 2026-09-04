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
    <title>Frequently Asked Questions</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/faq.css" />
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

    <!-- SIDEBAR DARK OVERLAY  -->
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

    <!---Questions -->

    <div class="Titulos">
      <h1>Frequently Asked Questions</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            This section aims to support users who have unanswered questions
            about cancer. We understand that many people seek information about
            cancer, but this information sometimes fails to fully address their
            questions about the disease. However, we at Canrisk strive to
            resolve these doubts about this illness.
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

    <!-- FREQUENTLY ASKED QUESTIONS -->
    <div class="faq-section">
      <div class="faq-search-wrap">
        <input
          type="text"
          id="faqSearch"
          class="faq-search"
          placeholder="Search your question here..."
        />
      </div>
      <p class="faq-hint">
        Type a keyword, for example "prevention" or "chemotherapy"
      </p>

      <div class="faq-category" data-category="general">
        <h2>About cancer in general</h2>

        <details class="faq-item">
          <summary>What exactly is cancer?</summary>
          <div class="faq-answer">
            It's a general term used to describe diseases in which some cells in
            the body multiply uncontrollably and can invade nearby tissues or
            spread to other parts of the body. There are more than 100 different
            types, each with different causes and behaviors.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is cancer always hereditary?</summary>
          <div class="faq-answer">
            No. Only a portion of cases have a clear genetic component. Most are
            related to a combination of factors such as lifestyle, environment,
            and age, rather than a single inherited cause.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is cancer contagious?</summary>
          <div class="faq-answer">
            No, cancer itself is not transmitted from person to person. However,
            some infections that can be contagious, such as HPV or the bacteria
            Helicobacter pylori, are linked to a higher risk of developing
            certain types of cancer.
          </div>
        </details>

        <details class="faq-item">
          <summary>Are all tumors cancerous?</summary>
          <div class="faq-answer">
            No. There are benign tumors, which don't invade other tissues or
            spread, and malignant tumors, which do have that ability. A doctor
            is the one who can determine, through testing, which type it is.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="prevencion">
        <h2>Prevention and detection</h2>

        <details class="faq-item">
          <summary>
            At what age should I start getting preventive check-ups?
          </summary>
          <div class="faq-answer">
            It depends on the type of cancer and each person's family history.
            In general, many routine screenings (such as mammograms or
            colonoscopies) are recommended starting at age 40–50, but a doctor
            may recommend different ages based on your history. The important
            thing is not to wait until you have symptoms to see a doctor.
          </div>
        </details>

        <details class="faq-item">
          <summary>Can I prevent cancer just with healthy habits?</summary>
          <div class="faq-answer">
            A balanced diet, regular physical activity, avoiding tobacco, and
            limiting alcohol significantly reduce the risk of several types of
            cancer, but they don't guarantee absolute prevention. Combining good
            habits with regular medical check-ups is the most effective
            strategy.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            If I don't have symptoms, should I still get tested?
          </summary>
          <div class="faq-answer">
            Yes. Many types of cancer show no visible symptoms in their early
            stages, which usually have the best prognosis. That's exactly why
            screening tests are designed for people without symptoms.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="tratamiento">
        <h2>Treatment</h2>

        <details class="faq-item">
          <summary>What are the most common cancer treatments?</summary>
          <div class="faq-answer">
            The most common are surgery, chemotherapy, and radiation therapy,
            although targeted therapies and immunotherapy also exist. The
            treatment plan depends on the type of cancer, its stage, and the
            patient's overall condition, and is always defined by a specialized
            medical team.
          </div>
        </details>

        <details class="faq-item">
          <summary>Can cancer be cured?</summary>
          <div class="faq-answer">
            Many types of cancer, especially when detected in early stages, have
            very high cure or remission rates. The prognosis varies a lot
            depending on the type, stage, and individual response to treatment,
            so it's important to discuss it directly with the treating medical
            team.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is it normal to feel very tired during treatment?</summary>
          <div class="faq-answer">
            Yes, fatigue is one of the most common side effects during
            chemotherapy and radiation therapy. It's important to tell your
            medical team, since there are strategies to help manage it.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="apoyo">
        <h2>Emotional and family support</h2>

        <details class="faq-item">
          <summary>How can I help a family member who was diagnosed?</summary>
          <div class="faq-answer">
            Listening without judgment, asking what they need instead of
            assuming it, and accompanying them to medical appointments if they
            want, is usually a great help. Visit our
            <a href="psycho-helpING.php">Psychological Support</a> section for
            more practical guidance.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            Is it normal to feel fear or sadness if I've been diagnosed with
            cancer?
          </summary>
          <div class="faq-answer">
            Yes, it's a completely understandable reaction. Many people go
            through different emotions during the process, and there's no
            "right" way to feel. Seeking specialized psychological support can
            help process these emotions in a healthy way.
          </div>
        </details>

        <details class="faq-item">
          <summary>Where can I find free psychological support?</summary>
          <div class="faq-answer">
            In El Salvador there are free helplines such as #TeEscucho from ISSS
            (7071-1302, available 24/7) or FOSALUD. You can find full details in
            our <a href="psycho-helpING.php">Psychological Support</a> section.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="canrisk">
        <h2>About Canrisk</h2>

        <details class="faq-item">
          <summary>Does Canrisk replace a doctor's consultation?</summary>
          <div class="faq-answer">
            No. Canrisk is an educational and informational platform; it does
            not replace a diagnosis, treatment, or the opinion of a healthcare
            professional. For any symptom or medical concern, we always
            recommend seeing a specialist.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is the questionnaire and my data confidential?</summary>
          <div class="faq-answer">
            Yes, the questionnaire responses are completely anonymous and are
            used solely for educational and statistical purposes to improve our
            content.
          </div>
        </details>

        <details class="faq-item">
          <summary>I have a question that isn't here, what do I do?</summary>
          <div class="faq-answer">
            You can submit it through the Google form shown above on this page.
            The Canrisk team responds within 1 to 7 days through the email you
            provide.
          </div>
        </details>
      </div>

      <p class="faq-no-results" id="faqNoResults">
        We couldn't find any questions matching your search. Try a different
        keyword.
      </p>
    </div>

    <div class="Titulos">
      <h1>Do you have more questions?</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            Through this section, we offer access to the most frequently asked
            questions on our site, and we also provide the possibility of asking
            questions in our questions section, which will be answered within a
            period of 1 to 7 days, via Gmail, after correctly entering the
            personal data to be able to send the message.
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
