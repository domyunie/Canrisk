/* ============================================================
   CANRISK — site.js
   Funciones compartidas por todas las páginas informativas:
   - Resalta la página actual en la navbar y en el sidebar.
   - Muestra un texto junto a la foto de perfil cuando el
     usuario ya inició sesión (lee "userSession" de localStorage).
   - Configura el botón de cambio de idioma (ES <-> EN).
   ============================================================ */

(function () {
  "use strict";

  // Mapa ES <-> EN. Las rutas son relativas a la raíz del proyecto.
  var LANG_MAP = {
    // Páginas en español -> inglés
    "principal.php": "HTML/INGLES/PrincipalING.php",
    "aboutus.php": "HTML/INGLES/aboutusENG.php",
    "contacto.php": "HTML/INGLES/ContactoING.php",
    "contacto-detalle.php": "HTML/INGLES/Contacto-detalleING.php",
    "cancer-intro.php": "HTML/INGLES/cancer-introING.php",
    "cancer.php": "HTML/INGLES/CancerING.php",
    "psycho-help.php": "HTML/INGLES/psycho-helpING.php",
    "help.php": "HTML/INGLES/helpING.php",
    "help-detalle.php": "HTML/INGLES/helpING.php",
    "ficha1.php": "HTML/INGLES/helpING.php",
    "quizz.php": "HTML/INGLES/quizzING.php",
    "faq.php": "HTML/INGLES/faqING.php",
    "index.php": "INICIO/IndexING.php",
    "faq.n.php": "INICIO/Faq.N-ING.php",

    // Páginas en inglés -> español
    "principaling.php": "HTML/ESPANOL/Principal.php",
    "aboutuseng.php": "HTML/ESPANOL/aboutus.php",
    "contactoing.php": "HTML/ESPANOL/Contacto.php",
    "contacto-detalleing.php": "HTML/ESPANOL/Contacto-Detalle.php",
    "cancer-introing.php": "HTML/ESPANOL/cancer-intro.php",
    "cancering.php": "HTML/ESPANOL/cancer.php",
    "psycho-helping.php": "HTML/ESPANOL/psycho-help.php",
    "helping.php": "HTML/ESPANOL/help.php",
    "quizzing.php": "HTML/ESPANOL/quizz.php",
    "faqing.php": "HTML/ESPANOL/faq.php",
    "indexing.php": "INICIO/Index.php",
    "faq.n-ing.php": "INICIO/Faq.N.php",
  };

  function currentBasename() {
    var path = window.location.pathname;
    var last = path.substring(path.lastIndexOf("/") + 1);
    try {
      last = decodeURIComponent(last);
    } catch (e) {
      /* noop */
    }
    return last.toLowerCase() || "index.php";
  }

  function rootPrefix() {
    var path = window.location.pathname;
    if (/\/HTML\/(ESPANOL|INGLES)\//i.test(path)) return "../../";
    if (/\/INICIO\//i.test(path)) return "../";
    return "";
  }

  function currentIsEnglish() {
    return (
      (document.documentElement.lang || "es").toLowerCase().indexOf("en") === 0
    );
  }

  /* ---------- 1. Resaltar la página actual (navbar + sidebar) ---------- */
  function highlightActivePage() {
    var current = currentBasename();

    document
      .querySelectorAll(".Info-nav a, .sidebar-list a")
      .forEach(function (a) {
        var href = a.getAttribute("href");
        if (!href) return;
        var base = href.substring(href.lastIndexOf("/") + 1).toLowerCase();
        if (base === current) {
          a.classList.add("active");
          var boxII = a.closest(".box-II");
          if (boxII) boxII.classList.add("active");
        }
      });
  }

  /* ---------- 2. Texto de sesión junto a la foto de perfil ---------- */
  function setupSessionIndicator() {
    var photo = document.querySelector(".Photo");
    if (!photo) return;

    var session = null;
    try {
      session = JSON.parse(localStorage.getItem("userSession"));
    } catch (e) {
      /* noop */
    }
    if (!session || !session.username) return;

    var isEnglish = currentIsEnglish();

    var wrapper = document.createElement("button");
    wrapper.type = "button";
    wrapper.className = "session-text show";
    wrapper.title = isEnglish
      ? "Click to log out"
      : "Haz clic para cerrar sesión";

    var greeting = document.createElement("span");
    greeting.className = "session-greeting";
    greeting.textContent = isEnglish ? "Signed in as" : "Sesión iniciada como";

    var user = document.createElement("span");
    user.className = "session-user";
    user.textContent = session.username;

    var logout = document.createElement("span");
    logout.className = "session-logout";
    logout.textContent = isEnglish ? "Log out" : "Cerrar sesión";

    wrapper.appendChild(greeting);
    wrapper.appendChild(user);
    wrapper.appendChild(logout);

    wrapper.addEventListener("click", function () {
      localStorage.removeItem("userSession");
      window.location.reload();
    });

    photo.appendChild(wrapper);
  }

  /* ---------- 3. Botón de cambio de idioma ---------- */
  function setupLangSwitch() {
    var btn =
      document.getElementById("langSwitch") ||
      document.getElementById("langSwitchNL");
    if (!btn) return;

    var current = currentBasename();
    var target = LANG_MAP[current];

    if (!target) {
      var isEnglish = currentIsEnglish();
      target = isEnglish
        ? "HTML/ESPANOL/Principal.php"
        : "HTML/INGLES/PrincipalING.php";
    }

    btn.setAttribute("href", rootPrefix() + target);
    btn.textContent = currentIsEnglish() ? "ES" : "EN";
  }

  document.addEventListener("DOMContentLoaded", function () {
    highlightActivePage();
    setupSessionIndicator();
    setupLangSwitch();
  });
})();
