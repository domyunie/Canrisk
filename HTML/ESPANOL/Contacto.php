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
    <title>Contactos - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/contacto.css" />
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <!--  LOGO Y BOTÓN DEL MENÚ LATERAL  -->
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

    <!-- MENÚ LATERAL (SIDEBAR)  -->
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

    <!--  BARRA DE NAVEGACIÓN SUPERIOR -->
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

    <!--  ENCABEZADO DE LA PÁGINA  -->
    <header class="hero-section">
      <div class="hero-container">
        <div class="Titulos-DEG">
          <h1 class="hero-title">Contactos</h1>
        </div>
        <p class="hero-subtitle">
          Números telefónicos de centros hospitalarios que tratan el cáncer
        </p>
      </div>
    </header>

    <main class="contacto-main">
      <!-- INTRODUCCIÓN -->
      <div class="contacto-intro-box">
        <p>
          Encontrar el número correcto en un momento de urgencia no debería ser
          difícil. Por eso reunimos en un solo lugar los contactos de los
          principales hospitales públicos de El Salvador que atienden casos de
          cáncer, junto con nuestro propio soporte técnico. Usa el buscador para
          filtrar por nombre de hospital o por departamento, o simplemente
          explora la lista completa abajo.
        </p>
      </div>

      <!-- MINI ESTADÍSTICAS -->
      <div class="contacto-stats">
        <div class="stat-pill">
          <strong>15</strong>
          <span>Centros hospitalarios</span>
        </div>
        <div class="stat-pill">
          <strong>6</strong>
          <span>Departamentos cubiertos</span>
        </div>
        <div class="stat-pill">
          <strong>24/7</strong>
          <span>Mayoría con servicio continuo</span>
        </div>
      </div>

      <!-- BUSCADOR INTERACTIVO -->
      <div class="contacto-buscador">
        <input
          type="text"
          id="buscadorHospital"
          placeholder="Busca por hospital o departamento (ej. Santa Ana)"
        />
        <p class="buscador-resultado" id="buscadorResultado"></p>
      </div>

      <div class="contacto-grid" id="gridHospitales">
        <div
          class="contacto-card"
          data-nombre="Hospital de Oncología ISSS"
          data-depto="San Salvador"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital de Oncología ISSS</h3>
          <a class="dato" href="tel:+50325915400">2591-5400</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Salvador
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=1"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Nacional Rosales"
          data-depto="San Salvador"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Nacional Rosales</h3>
          <a class="dato" href="tel:+50322319200">2231-9200</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Salvador
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=2"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital de Niños Benjamín Bloom"
          data-depto="San Salvador"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital de Niños Benjamín Bloom</h3>
          <a class="dato" href="tel:+50325944000">2594-4000</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Salvador
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=3"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Nacional de la Mujer"
          data-depto="San Salvador"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Nacional de la Mujer</h3>
          <a class="dato" href="tel:+50325652100">2565-2100</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Salvador
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=4"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Instituto del Cáncer de El Salvador"
          data-depto="San Salvador"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Instituto del Cáncer de El Salvador</h3>
          <a class="dato" href="tel:+50322254354">2225-4354</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Salvador
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio Lun - Vie: 7:00 AM - 4:00 PM
          </p>
          <a
            href="Contacto-Detalle.php?id=5"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Nacional San Juan de Dios de Santa Ana"
          data-depto="Santa Ana"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Nacional "San Juan de Dios" de Santa Ana</h3>
          <a class="dato" href="tel:+50324840300">2484-0300</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            Santa Ana
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=6"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Nacional San Juan de Dios de San Miguel"
          data-depto="San Miguel"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Nacional "San Juan de Dios" de San Miguel</h3>
          <a class="dato" href="tel:+50326842700">2684-2700</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Miguel
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=7"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Médico Quirúrgico ISSS"
          data-depto="San Salvador"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Médico Quirúrgico ISSS</h3>
          <a class="dato" href="tel:+50325914100">2591-4100</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Salvador
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=8"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Regional ISSS Santa Ana"
          data-depto="Santa Ana"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Regional ISSS Santa Ana</h3>
          <a class="dato" href="tel:+50324891400">2489-1400</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            Santa Ana
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=9"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Regional ISSS San Miguel"
          data-depto="San Miguel"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Regional ISSS San Miguel</h3>
          <a class="dato" href="tel:+50326651200">2665-1200</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Miguel
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=10"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Nacional General Masferrer"
          data-depto="Usulután"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Nacional General Masferrer</h3>
          <a class="dato" href="tel:+50326090100">2609-0100</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            Usulután
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=11"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital General ISSS"
          data-depto="San Salvador"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital General ISSS</h3>
          <a class="dato" href="tel:+50325912100">2591-2100</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            San Salvador
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=12"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Nacional San Rafael"
          data-depto="Santa Tecla"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Nacional San Rafael</h3>
          <a class="dato" href="tel:+50325239700">2523-9700</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            Santa Tecla
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=13"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Policlínico Zacamil ISSS"
          data-depto="Mejicanos"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Policlínico Zacamil ISSS</h3>
          <a class="dato" href="tel:+50325916600">2591-6600</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            Mejicanos
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=14"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>

        <div
          class="contacto-card"
          data-nombre="Hospital Nacional Santa Teresa"
          data-depto="Zacatecoluca"
        >
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Hospital Nacional Santa Teresa</h3>
          <a class="dato" href="tel:+50323624300">2362-4300</a>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; margin-top: 4px"
          >
            Zacatecoluca
          </p>
          <p
            class="dato"
            style="font-weight: 400; font-size: 0.85rem; color: #a1a1a1"
          >
            Servicio las 24 horas.
          </p>
          <a
            href="Contacto-Detalle.php?id=15"
            style="
              display: inline-block;
              margin-top: 15px;
              color: #b23d74;
              font-weight: 700;
              text-decoration: none;
            "
            >Ver detalles &rarr;</a
          >
        </div>
      </div>

      <div class="contacto-intro" style="margin-top: 40px">
        <h2 style="font-size: 1.5rem; letter-spacing: 1px">
          Contacto de soporte técnico de Canrisk
        </h2>
      </div>

      <div class="contacto-grid">
        <div class="contacto-card">
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 5c0-1 1-2 2-2h2l2 5-2 2c1 3 3 5 6 6l2-2 5 2v2c0 1-1 2-2 2C10 20 4 14 4 5z"
              />
            </svg>
          </div>
          <h3>Número telefónico</h3>
          <a class="dato" href="tel:+50389905890">8990-5890</a>
        </div>

        <div class="contacto-card">
          <div class="icono-card" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
              />
              <polyline points="22,6 12,13 2,6" />
            </svg>
          </div>
          <h3>Correo electrónico</h3>
          <a class="dato" href="mailto:soporte@canrisk.com"
            >soporte@canrisk.com</a
          >
        </div>
      </div>

      <!-- ACORDEÓN: PREGUNTAS RÁPIDAS SOBRE A QUIÉN LLAMAR -->
      <div class="contacto-faq">
        <h2 class="contacto-faq-titulo">Preguntas rápidas</h2>

        <div class="faq-item">
          <button class="faq-pregunta" type="button">
            ¿Cuándo debo llamar al 911 en vez de a un hospital?
          </button>
          <div class="faq-respuesta">
            <p>
              Llama al 911 si hay una emergencia que pone en riesgo la vida de
              forma inmediata: dificultad para respirar, sangrado que no se
              detiene, dolor de pecho intenso o pérdida de conciencia. Para
              citas, resultados de exámenes o dudas sobre tratamiento, contacta
              directamente al hospital.
            </p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-pregunta" type="button">
            ¿A quién llamo si no sé qué hospital me corresponde?
          </button>
          <div class="faq-respuesta">
            <p>
              Puedes comunicarte con el Instituto del Cáncer de El Salvador o
              con el hospital público más cercano a tu domicilio; ellos pueden
              orientarte y, si es necesario, referirte al centro especializado
              adecuado.
            </p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-pregunta" type="button">
            ¿El soporte técnico de Canrisk atiende temas médicos?
          </button>
          <div class="faq-respuesta">
            <p>
              No. Nuestro equipo de soporte solo resuelve problemas con la
              plataforma, como errores al iniciar sesión o al usar el
              cuestionario. Para consultas médicas, comunícate siempre con un
              hospital o profesional de la salud.
            </p>
          </div>
        </div>
      </div>
    </main>

    <!--  PIE DE PÁGINA  -->
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

      // BUSCADOR INTERACTIVO DE HOSPITALES
      const inputBuscador = document.getElementById("buscadorHospital");
      const resultadoTexto = document.getElementById("buscadorResultado");
      const tarjetas = document.querySelectorAll(
        "#gridHospitales .contacto-card",
      );

      inputBuscador.addEventListener("input", () => {
        const termino = inputBuscador.value.trim().toLowerCase();
        let visibles = 0;

        tarjetas.forEach((tarjeta) => {
          const nombre = (tarjeta.dataset.nombre || "").toLowerCase();
          const depto = (tarjeta.dataset.depto || "").toLowerCase();
          const coincide = nombre.includes(termino) || depto.includes(termino);

          tarjeta.classList.toggle("oculta", !coincide);
          if (coincide) visibles++;
        });

        if (termino === "") {
          resultadoTexto.textContent = "";
        } else if (visibles === 0) {
          resultadoTexto.textContent =
            "No se encontraron hospitales con ese criterio.";
        } else {
          resultadoTexto.textContent = `${visibles} hospital(es) encontrado(s).`;
        }
      });

      // ACORDEÓN DE PREGUNTAS RÁPIDAS
      document.querySelectorAll(".faq-item").forEach((item) => {
        const pregunta = item.querySelector(".faq-pregunta");
        const respuesta = item.querySelector(".faq-respuesta");

        pregunta.addEventListener("click", () => {
          const estaAbierto = item.classList.contains("abierto");

          document.querySelectorAll(".faq-item.abierto").forEach((otro) => {
            otro.classList.remove("abierto");
            otro.querySelector(".faq-respuesta").style.maxHeight = null;
          });

          if (!estaAbierto) {
            item.classList.add("abierto");
            respuesta.style.maxHeight = respuesta.scrollHeight + "px";
          }
        });
      });
    </script>
    <script src="../../JS/site.js" defer></script>
  </body>
</html>
