<?php
session_start();
//Verificar si la sesion esta iniciada
if (isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    $redirectUrl = $isEnglish ? "../HTML/INGLES/PrincipalING.php" : "../HTML/ESPANOL/Principal.php";
    
    header("Location: " . $redirectUrl);
    exit; 
}
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Frequently Asked Questions - Canrisk</title>
    <link rel="stylesheet" href="../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../CSS/faq.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../Canrisk/MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <!-- LOGO AND SIDEBAR TOGGLE BUTTON -->
    <div class="navbar-brand">
      <button
        class="hamburger-sidebar-btn"
        id="sidebarBtn"
        aria-label="Open sidebar"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>
      <h1>Canrisk</h1>
      <img src="../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" class="C-L" />
    </div>

    <!-- SIDE MENU (SIDEBAR) -->
    <nav class="sidebar-menu" id="sidebarMenu">
      <div class="sidebar-decoration">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="sidebar-list">
        <li><a href="../INICIO/IndexING.php">Home &rarr;</a></li>
      </ul>
    </nav>

    <!-- SIDEBAR DARK OVERLAY -->

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
          <a href="../INICIO/Faq.N-ING.php"
            ><h4>Frequently Asked Questions</h4></a
          >
        </li>
        <li class="box-II">
          <h4><a href="../INICIO/IndexING.php">Home Page</a></h4>
        </li>
      </ul>

      <div class="right-group">
        <ul class="Index">
          <li class="box-I">
            <a href="../HTML/INGLES/loginING.php"><h4>Log in</h4></a>
          </li>
          <li class="box-I">
            <a href="../HTML/INGLES/registerING.php"><h4>Sign Up</h4></a>
          </li>
        </ul>
        <a
          id="langSwitch"
          class="lang-switch"
          href="#"
          aria-label="Cambiar idioma / Switch language"
          >ES</a
        >
        <div class="Photo">
          <img
            src="../MULTIMEDIA/profile.png"
            class="PP-default"
            alt="Foto de perfil del usuario"
          />
        </div>
      </div>
    </nav>

    <!---Preguntas -->

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
            resolve these doubts.
          </p>
        </div>
      </div>
      <div class="IMG">
        <img
          src="../../Canrisk/MULTIMEDIA/signodeinterrogacion.avif"
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
          placeholder="Search for your question here..."
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
            It is a general term describing diseases in which some of the body's
            cells multiply uncontrollably and can invade nearby tissues or
            spread to other parts of the body. There are more than 100 different
            types, each with different causes and behaviors.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is cancer always hereditary?</summary>
          <div class="faq-answer">
            No. Only a portion of cases have a clear genetic component. Most are
            linked to a combination of factors—such as lifestyle, environment,
            and age—rather than a single inherited cause.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is cancer contagious?</summary>
          <div class="faq-answer">
            No, cancer itself is not transmitted from person to person. However,
            certain infections that are contagious—such as HPV or the
            *Helicobacter pylori* bacterium—are associated with an increased
            risk of developing specific types of cancer.
          </div>
        </details>

        <details class="faq-item">
          <summary>Are all tumors cancerous?</summary>
          <div class="faq-answer">
            No. There are benign tumors, which do not invade other tissues or
            spread, and malignant tumors, which do have that capability. A
            doctor can determine the type through medical tests.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="prevention">
        <h2>Prevention and detection</h2>

        <details class="faq-item">
          <summary>
            At what age should I start getting preventive check-ups?
          </summary>
          <div class="faq-answer">
            It depends on the type of cancer and each person's family history.
            In general, many routine screenings (such as mammograms or
            colonoscopies) are recommended starting between the ages of 40 and
            50, though a doctor may suggest different ages based on your medical
            history. The important thing is not to wait until you have symptoms
            before consulting a professional.
          </div>
        </details>

        <details class="faq-item">
          <summary>Can I prevent cancer solely through healthy habits?</summary>
          <div class="faq-answer">
            A balanced diet, regular physical activity, avoiding tobacco, and
            limiting alcohol significantly reduce the risk of various types of
            cancer, but they do not guarantee absolute prevention. Combining
            healthy habits with regular medical check-ups is the most effective
            strategy.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            Should I still get tested if I don't have any symptoms?
          </summary>
          <div class="faq-answer">
            Yes. Many types of cancer do not show visible symptoms in their
            early stages—which are usually when the prognosis is best. That is
            precisely why screening tests are designed for people who do not
            have symptoms.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="treatment">
        <h2>Treatment</h2>

        <details class="faq-item">
          <summary>What are the most common cancer treatments?</summary>
          <div class="faq-answer">
            The most common treatments are surgery, chemotherapy, and radiation
            therapy, although targeted therapies and immunotherapy are also
            available. The treatment plan depends on the type of cancer, its
            stage, and the patient's general condition, and is always determined
            by a specialized medical team.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is there a cure for cancer?</summary>
          <div class="faq-answer">
            Many types of cancer, especially when detected at an early stage,
            have very high cure or remission rates. Prognosis varies greatly
            depending on the type, stage, and individual response to treatment,
            so it is important to discuss this directly with the treating
            medical team.
          </div>
        </details>

        <details class="faq-item">
          <summary>Is it normal to feel very tired during treatment?</summary>
          <div class="faq-answer">
            Yes, fatigue is one of the most common side effects during
            chemotherapy and radiation therapy. It is important to inform the
            medical team, as there are strategies available to help manage it.
          </div>
        </details>
      </div>

      <div class="faq-category" data-category="support">
        <h2>Emotional and family support</h2>

        <details class="faq-item">
          <summary>
            How can I help a family member who has been diagnosed?
          </summary>
          <div class="faq-answer">
            Listening without judgment, asking what they need instead of making
            assumptions, and accompanying them to medical appointments if they
            wish can be very helpful. Visit our
            <a href="psycho-help.php">Psychological Support</a> section for
            more practical guidance.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            Is it normal to feel fear or sadness after a cancer diagnosis?
          </summary>
          <div class="faq-answer">
            Yes, it is a completely understandable reaction. Many people
            experience a range of emotions throughout the process, and there is
            no "right" way to feel. Seeking specialized psychological support
            can help you process these emotions in a healthy way.
          </div>
        </details>

        <details class="faq-item">
          <summary>Where can I find free psychological support?</summary>
          <div class="faq-answer">
            In El Salvador, there are free helplines such as the ISSS
            "#TeEscucho" service (7071-1302, available 24/7) or FOSALUD. You can
            find full details in our
            <a href="psycho-help.php">Psychological Support</a> section.
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
            professional. If you have any symptoms or medical concerns, we
            always recommend consulting a specialist.
          </div>
        </details>

        <details class="faq-item">
          <summary>Are the questionnaire and my data confidential?</summary>
          <div class="faq-answer">
            Yes, questionnaire responses are completely anonymous and are used
            solely for educational and statistical purposes to improve our
            content.
          </div>
        </details>

        <details class="faq-item">
          <summary>
            I have a question that isn't listed here; what should I do?
          </summary>
          <div class="faq-answer">
            You can submit it using the Google form found at the top of this
            page. The Canrisk team will respond within 1 to 7 days via the email
            address you provide.
          </div>
        </details>
      </div>

      <p class="faq-no-results" id="faqNoResults">
        We couldn't find any questions matching your search. Try a different
        keyword.
      </p>
    </div>

    <!--Cuestionario google forms-->

    <div class="Titulos">
      <h1>Do you have any more questions?</h1>
    </div>
    <br />
    <div class="fila-texto-img">
      <div class="content-text">
        <div class="Start">
          <p>
            Through this section we offer access to the most frequently asked
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
        Answer the questionnaire in Google Forms &rarr;
      </a>
    </div>

    <!-- FOOTER -->
    <footer>
      <div class="footer-container">
        <div class="footer-content">
          <div class="footer-col">
            <h2 class="Title">COPYRIGHT</h2>
            <ul class="Advice">
              <li>&copy; Canrisk 2026</li>
              <li>All rights reserved to the Canrisk team.</li>
              <li>
                Special thanks to the whole team who made this page possible.
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
                In case of an emergency or symptom, rely on the hospital numbers
                that we provide, or call 911 directly.
              </li>
            </ul>
          </div>
        </div>
        <div class="footer-social">
          <h2 class="Title_2">Canrisk's social media!</h2>
          <ul class="Social">
            <li>
              <a href="https://www.instagram.com/canrisk/" target="_blank"
                ><img
                  src="../../Canrisk/MULTIMEDIA/instagram.png"
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
                  src="../../Canrisk/MULTIMEDIA/facebook.png"
                  class="Face-IMG"
                  alt="Facebook logo"
                />
                <p class="Face-txt">Facebook</p></a
              >
            </li>
            <li>
              <a href="https://twitter.com/Canrisk1" target="_blank"
                ><img
                  src="../../Canrisk/MULTIMEDIA/gorjeo.png"
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

    <script src="../JS/site.js" defer></script>
  </body>
</html>
