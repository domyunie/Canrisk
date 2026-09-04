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
      <title>Centro de Ayuda - Canrisk</title>
      <link rel="stylesheet" href="../../CSS/Style-Info.css" />
      <link rel="stylesheet" href="../../CSS/help.css" />
      <link
        rel="icon"
        type="image/png"
        href="../../MULTIMEDIA/Canrisk LOGO.svg"
      />
    </head>
    <body>
      <!--  LOGO Y BOTÓN DEL MENÚ LATERAL -->
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

      <!--  MENÚ LATERAL (SIDEBAR) -->
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

      <!--  FONDO OSCURO AL ABRIR EL SIDEBAR  -->
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

      <!-- ENCABEZADO DE LA PÁGINA -->
      <div class="Titulos">
        <br />
        <h1>Centro de ayuda a personas necesitadas</h1>
      </div>

      <div class="help-grid">
        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=1'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona1.jpe" alt="Mateo Sebastián" />
          </div>
          <div class="help-info">
            <h3>Mateo Sebastián</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Mateo Sebastián<br />
              <strong>Edad:</strong> 20 años<br />
              <strong>Tipo de cáncer:</strong> Linfoma<br />
              <strong>Ubicación:</strong> San Salvador, San Salvador<br />
              <strong>Meta:</strong> Graduarse profesionalmente de la carrera de
              música y especializarse en composición.<br />
              <strong>Teléfono:</strong> +503 7123-4567
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $805/$1200</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 67%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=2'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona3.jpg" alt="Camila Valentina" />
          </div>
          <div class="help-info">
            <h3>Camila Valentina</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Camila Valentina<br />
              <strong>Edad:</strong> 22 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Tiroides<br />
              <strong>Ubicación:</strong> Santa Tecla, La Libertad<br />
              <strong>Meta:</strong> Estudiar medicina forense en el extranjero
              para colaborar en el análisis de casos complejos.<br />
              <strong>Teléfono:</strong> +503 7234-5678
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $2005/$2500</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 80%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=3'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona4.avif" alt="Valeria Sofía" />
          </div>
          <div class="help-info">
            <h3>Valeria Sofía</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Valeria Sofía<br />
              <strong>Edad:</strong> 19 años<br />
              <strong>Tipo de cáncer:</strong> Leucemia<br />
              <strong>Ubicación:</strong> Santa Ana, Santa Ana<br />
              <strong>Meta:</strong> Lograr estudiar la carrera de derecho para
              defender activamente los derechos civiles.<br />
              <strong>Teléfono:</strong> +503 7345-6789
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $1405/$2000</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 70%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=4'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona%202.avif" alt="Daniel Alejandro" />
          </div>
          <div class="help-info">
            <h3>Daniel Alejandro</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Daniel Alejandro<br />
              <strong>Edad:</strong> 24 años<br />
              <strong>Tipo de cáncer:</strong> Leucemia<br />
              <strong>Ubicación:</strong> San Miguel, San Miguel<br />
              <strong>Meta:</strong> Costear el traslado y estadía de retorno para
              recibir tratamiento médico especializado cerca de su familia.<br />
              <strong>Teléfono:</strong> +503 7456-7890
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $2005/$3000</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 67%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=5'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona5.jpg" alt="Gabriela Marie" />
          </div>
          <div class="help-info">
            <h3>Gabriela Marie</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Gabriela Marie<br />
              <strong>Edad:</strong> 21 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Mama<br />
              <strong>Ubicación:</strong> Antiguo Cuscatlán, La Libertad<br />
              <strong>Meta:</strong> Concluir su carrera de Licenciatura en
              Idiomas Modernos y ejercer como docente bilingüe.<br />
              <strong>Teléfono:</strong> +503 7567-8901
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $950/$1500</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 63%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=6'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona6.webp" alt="Diego Fernando" />
          </div>
          <div class="help-info">
            <h3>Diego Fernando</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Diego Fernando<br />
              <strong>Edad:</strong> 18 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Colon<br />
              <strong>Ubicación:</strong> Soyapango, San Salvador<br />
              <strong>Meta:</strong> Convertirse en Ingeniero en Sistemas y crear
              aplicaciones accesibles para la salud oncológica.<br />
              <strong>Teléfono:</strong> +503 7678-9012
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $1100/$2200</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 50%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=7'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona7.jpg" alt="Andrea Nicole" />
          </div>
          <div class="help-info">
            <h3>Andrea Nicole</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Andrea Nicole<br />
              <strong>Edad:</strong> 23 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Piel<br />
              <strong>Ubicación:</strong> Ahuachapán, Ahuachapán<br />
              <strong>Meta:</strong> Estudiar Diseño Gráfico Digital e ilustrar
              cuentos infantiles sobre superación de adversidades.<br />
              <strong>Teléfono:</strong> +503 7789-0123
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $1800/$2000</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 90%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=8'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona8.avif" alt="Luis Carlos" />
          </div>
          <div class="help-info">
            <h3>Luis Carlos</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Luis Carlos<br />
              <strong>Edad:</strong> 25 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer Testicular<br />
              <strong>Ubicación:</strong> Sonsonate, Sonsonate<br />
              <strong>Meta:</strong> Abrir su propio taller o escuela de
              gastronomía local para rescatar recetas tradicionales.<br />
              <strong>Teléfono:</strong> +503 7890-1234
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $1205/$1800</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 67%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=9'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona9.jpg" alt="Mariana Estefanía" />
          </div>
          <div class="help-info">
            <h3>Mariana Estefanía</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Mariana Estefanía<br />
              <strong>Edad:</strong> 20 años<br />
              <strong>Tipo de cáncer:</strong> Linfoma<br />
              <strong>Ubicación:</strong> Cojutepeque, Cuscatlán<br />
              <strong>Meta:</strong> Estudiar Enfermería Profesional para brindar
              cuidados paliativos con un trato digno y empático.<br />
              <strong>Teléfono:</strong> +503 7901-2345
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $1600/$3200</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 50%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=10'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona10.jpe" alt="José Manuel" />
          </div>
          <div class="help-info">
            <h3>José Manuel</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> José Manuel<br />
              <strong>Edad:</strong> 22 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Colon<br />
              <strong>Ubicación:</strong> San Vicente, San Vicente<br />
              <strong>Meta:</strong> Culminar sus estudios en Agronomía para
              implementar cultivos sostenibles en su comunidad.<br />
              <strong>Teléfono:</strong> +503 7012-3456
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $2200/$4000</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 55%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=11'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona11.avif" alt="Elena Beatriz" />
          </div>
          <div class="help-info">
            <h3>Elena Beatriz</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Elena Beatriz<br />
              <strong>Edad:</strong> 19 años<br />
              <strong>Tipo de cáncer:</strong> Leucemia<br />
              <strong>Ubicación:</strong> Usulután, Usulután<br />
              <strong>Meta:</strong> Estudiar Psicología para ofrecer terapia de
              acompañamiento a familias de pacientes oncológicos.<br />
              <strong>Teléfono:</strong> +503 7111-2222
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $3400/$5000</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 68%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=12'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona12.avif" alt="Rodrigo André" />
          </div>
          <div class="help-info">
            <h3>Rodrigo André</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Rodrigo André<br />
              <strong>Edad:</strong> 21 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Tiroides<br />
              <strong>Ubicación:</strong> Mejicanos, San Salvador<br />
              <strong>Meta:</strong> Estudiar Arquitectura de Interiores y diseñar
              espacios accesibles para personas con movilidad reducida.<br />
              <strong>Teléfono:</strong> +503 7222-3333
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $4100/$6000</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 68%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=13'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona13.avif" alt="Sofía Alejandra" />
          </div>
          <div class="help-info">
            <h3>Sofía Alejandra</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Sofía Alejandra<br />
              <strong>Edad:</strong> 18 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Cuello Uterino<br />
              <strong>Ubicación:</strong> Chalatenango, Chalatenango<br />
              <strong>Meta:</strong> Completar su formación en Educación
              Parvularia para guiar y motivar el desarrollo infantil.<br />
              <strong>Teléfono:</strong> +503 7333-4444
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $1500/$2500</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 60%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=14'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona14.avif" alt="Carlos Eduardo" />
          </div>
          <div class="help-info">
            <h3>Carlos Eduardo</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Carlos Eduardo<br />
              <strong>Edad:</strong> 23 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Pulmón<br />
              <strong>Ubicación:</strong> San Francisco Gotera, Morazán<br />
              <strong>Meta:</strong> Estudiar Periodismo de Investigación para
              amplificar historias sociales de comunidades marginadas.<br />
              <strong>Teléfono:</strong> +503 7444-5555
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $2105/$3500</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 60%"></div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="help-card"
          onclick="window.location.href = 'help-detalle.php?id=15'"
          style="cursor: pointer"
        >
          <div class="help-photo">
            <img src="../../MULTIMEDIA/persona15.jpg" alt="Daniela Montserrat" />
          </div>
          <div class="help-info">
            <h3>Daniela Montserrat</h3>
            <div class="help-desc">
              <strong>Nombre:</strong> Daniela Montserrat<br />
              <strong>Edad:</strong> 20 años<br />
              <strong>Tipo de cáncer:</strong> Cáncer de Piel<br />
              <strong>Ubicación:</strong> La Unión, La Unión<br />
              <strong>Meta:</strong> Estudiar Medicina Veterinaria y fundar un
              refugio asistencial para animales desprotegidos.<br />
              <strong>Teléfono:</strong> +503 7555-6666
            </div>
            <div class="progress-container">
              <span class="progress-text">Fondos recaudados: $1850/$3000</span>
              <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: 61%"></div>
              </div>
            </div>
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
      <script src="../../JS/personasdata.js" defer></script>
    </body>
  </html>
