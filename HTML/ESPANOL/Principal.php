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
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Principal - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/principal.css" />
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

    <!--  MENÚ LATERAL (SIDEBAR)  -->
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

    <!--  ENCABEZADO DE LA PÁGINA -->
    <header class="hero-section">
      <div class="hero-container">
        <h1 class="hero-title">Evaluación, Apoyo y Esperanza</h1>
        <p class="hero-subtitle">
          Bienvenido a Canrisk. Somos una plataforma dedicada a brindar
          herramientas de prevención, soporte emocional y asistencia para
          jóvenes y familias enfrentando procesos oncológicos.
        </p>
        <a href="cancer.php" class="btn-cancer">
          <span>Conocer Tipos de Cáncer</span> &rarr;
        </a>
      </div>
    </header>

    <!--  DATOS RÁPIDOS  -->
    <br /><br />
    <div class="home-stats">
      <div class="home-stat-box">
        <span class="stat-icon">🎗️</span>
        <span class="stat-number">6</span>
        <span class="stat-label">tipos de cáncer explicados en detalle</span>
      </div>
      <div class="home-stat-box">
        <span class="stat-icon">💬</span>
        <span class="stat-number">10</span>
        <span class="stat-label">testimonios reales de sobrevivientes</span>
      </div>
      <div class="home-stat-box">
        <span class="stat-icon">🤝</span>
        <span class="stat-number">100%</span>
        <span class="stat-label">acompañamiento gratuito e informativo</span>
      </div>
    </div>

    <section class="info-row-container">
      <h2 class="info-row-title">Acompañamiento en el Camino</h2>
      <div class="fila-texto-img">
        <div class="content-text">
          <div class="Start">
            <p>
              Para apoyar a alguien con cáncer, la clave es la presencia
              auténtica y evitar el positivismo forzado que invalida sus miedos.
              Escucha activamente sin juzgar, permitiendo que la persona exprese
              su tristeza o enojo de forma segura. En lugar de preguntar "¿en
              qué ayudo?", ofrece acciones concretas como llevar comida, limpiar
              o hacer recados específicos.
            </p>
          </div>
        </div>

        <div class="IMG">
          <div class="flip-card" onclick="this.classList.toggle('flipped')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img
                  src="../../MULTIMEDIA/image 5.png"
                  alt="Acompañamiento y empatía"
                  class="IMG-TXT"
                />
              </div>
              <div class="flip-card-back">
                <p>
                  Respeta siempre su autonomía, tratándola como la persona que
                  es y no solo como un paciente bajo tratamiento. Evita dar
                  consejos médicos no solicitados o contar historias de otros
                  casos que generen presión innecesaria. El silencio acompañado
                  suele ser más reconfortante que las frases hechas o los
                  discursos motivacionales
                </p>
              </div>
            </div>
            <span class="flip-hint">Toca la imagen para ver más consejos</span>
          </div>
        </div>
      </div>
    </section>

    <!--Testimonios de fe-->

    <div class="title">
      <div class="hero-container">
        <h1 class="hero-title">Testimonios de fé</h1>
        <p class="hero-subtitle">
          <strong
            >En este apartado encontrarás diferentes testimonios de guerreros
            que vencieron el cáncer. Nunca pierdas la esperanza.</strong
          ><br />
        </p>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/ana-maria1200x675.jpg" alt="Ana María" />
      </div>
      <div class="test-info">
        <h3>Ana María, sobreviviente de cáncer de pulmón.</h3>
        <div class="test-desc">
          <p>
            <strong>
              En el caso que necesite volver a pelear, tengo los guantes ahí
              guardaditos.</strong
            ><br />
            Soy Ana María, sobreviviente de cáncer de pulmón categoría 4 y llevo
            6 meses libre de cáncer.<br />
            Con mi yerno, que es oncólogo, de la cual por momentos era positivo
            tener un yerno médico que entendiera del tema, pero en otros
            momentos no era positivo.<br />
            A mí nada lo que es negativo me sirve. Y como todo era negativo, en
            un momento dado tuve que sentarme con él y explicarle de que yo no
            funciono con cosas negativas, sus porcentajes y sus estadísticas. A
            mí no me sirven porque yo no me manejo con este tipo de cosas. Una
            vez que le expliqué que a mí eso me hacía mal y que no me sirve, que
            por suerte pudo entender que le costó.<br />
            Una gran ayuda el mantenerse uno positivo y rodearse de gente y de
            cosas. Si uno puede confrontar la enfermedad, puede confrontar a una
            persona o varias que sean negativas.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/juan luis tintaya-1.webp" alt="Juan Luis" />
      </div>
      <div class="test-info">
        <h3>Juan Luis, sobreviviente de cáncer de lengua.</h3>
        <div class="test-desc">
          <p>
            Hace aproximadamente 4 años, Juan Luis Tintaya tenía molestias en la
            lengua. Le salían llagas y le ardía. Él esperaba que estos síntomas
            se fueran, pero no ocurrió así y, a los dos meses, acudió al médico.
            El experto en cabeza y cuello le mandó a hacer una biopsia para
            descartar la posibilidad de una neoplasia maligna.<br />
            El resultado fue positivo para cáncer de lengua, piso de boca y
            ganglios. En ese entonces Juan Luis tenía 41 años y trabajaba
            bastante. Sin embargo, esta noticia, le dio una pausa a su vida
            laboral y se ocupó de su salud. Se operó y luego pasó por
            quimioterapia y radiación. Su experiencia con el tratamiento de
            cáncer duró 3 meses. Fue corta, pero intensa. Se logró extirpar la
            parte afectada y se le retiraron los ganglios. Tuvo 33 sesiones de
            radiación y le dieron tres dosis fuertes de quimioterapia. Después
            de eso estuvo bien.<br />
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/felix salomon-1.webp" alt="Felix Salomon" />
      </div>
      <div class="test-info">
        <h3>Felix Salomon, sobreviviente de cáncer de próstata.</h3>
        <div class="test-desc">
          <p>
            A Félix Salomon le dio cáncer de próstata en el año 2009, cuando
            tenía 61 años. Lamentablemente, pasó por la experiencia de una mala
            praxis y después de eso llegó a otro hospital, ahí le realizaron los
            exámenes respectivos y se sometió a otra operación.<br />
            Después de esa operación, el señor Salomón siguió sus controles
            médicos y, gracias a esa buena costumbre le detectaron tempranamente
            una reactivación del cáncer, en el 2012. Pasó por 36 sesiones de
            radioterapia y actualmente se controla una vez al año.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/felipe yanes-1.webp" alt="Felipe Yanes" />
      </div>
      <div class="test-info">
        <h3>Felipe Yanes, sobreviviente de cáncer de próstata.</h3>
        <div class="test-desc">
          <p>
            Hace 9 años, Felipe Yanes se enteró de que tenía cáncer de próstata,
            gracias a los chequeos médicos de rutina que él acostumbraba
            realizarse. Su gran sentido del humor y su mirada positiva de la
            vida jugaron a su favor durante todo el tratamiento de la
            enfermedad.<br />
            Este es su testimonio como paciente de cáncer: “Cuando me hicieron
            la biopsia, según mi estilo, les dije a los médicos: Si es bingo,
            anotamos el número, porque tiene que ser premiado. Ellos se rieron.
            Y, efectivamente, era cáncer. No me deprimí, confié en los médicos y
            me sometí a la operación que me indicaron”.<br />
            Yanes no tuvo necesidad de hacer quimioterapia o radioterapia, en su
            caso bastó la operación. Después ha seguido los controles periódicos
            muy ordenadamente y aconseja a todos que hagan lo mismo, pues así se
            puede encontrar un cáncer en sus inicios.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/amy-16x9-1.jpg" alt="Amy" />
      </div>
      <div class="test-info">
        <h3>Amy, sobreviviente de cáncer de cuello uterino (Cérvix).</h3>
        <div class="test-desc">
          <p>
            Antes de recibir mi diagnóstico de cáncer, mi salud siempre estuvo
            muy bien. No tuve ningún problema grave y mi ciclo menstrual era
            normal. Luego, en noviembre del 2011 tuve un sangrado vaginal
            significativo por alrededor de una semana, seguido de ausencia total
            del periodo en el mes siguiente, lo cual no era normal para mí.<br />
            Con el paso del tiempo y cob el tratamiento aprendí a tratarme
            mejor. Escucho a mi cuerpo. Cuando estoy cansada, descanso. Cuando
            estoy triste, lloro. Cuando estoy feliz, río. Todavía sigo
            conociendo mi "nuevo" cuerpo. Algunas veces, funciona bien, otras
            no. Pero estoy viva y estoy bien, ¡y estoy rodeada por aquellos que
            más amo!
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/cindy-16x9-1.jpg" alt="Cindy" />
      </div>
      <div class="test-info">
        <h3>Cindy, sobreviviente de cáncer de cuello uterino (Cérvix).</h3>
        <div class="test-desc">
          <p>
            Fue alrededor de Navidad que fui a hacerme una de mis pruebas de
            detección de rutina. No le di importancia porque era solo una cita
            médica de rutina, como tantas otras anteriores. Pero nunca olvidaré
            la llamada del médico que recibí después: la prueba de Papanicoláu
            había dado anormal y había células precancerosas en la muestra que
            me tomaron.<br />
            Decidí someterme a un procedimiento para sacar las células. Recuerdo
            estar descansando en casa durante mi recuperación y sentirme muy
            agradecida por esa cita médica. De no haberla tenido, el futuro
            podría haber sido muy distinto para mí.<br />
            La gente escucha la palabra "cáncer" y se pregunta, "¿Lo
            sobreviviré? ¿Tendré que vivir siempre con esto?". Pero sé que ese
            no tiene que ser siempre el caso. Podemos encontrar estos problemas
            al inicio, prevenir el cáncer antes de que comience y luego
            recuperarnos y alcanzar nuestro máximo potencial en la vida.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/brittany-16x9-1.jpg" alt="Brittany" />
      </div>
      <div class="test-info">
        <h3>Brittany, sobreviviente de cáncer de Cérvix.</h3>
        <div class="test-desc">
          <p>
            En septiembre del 2015, estaba completando mis estudios en la
            Squadron Officer School cuando noté un bulto en mi vulva un día
            cuando salía de la ducha. No le puse mucha atención al comienzo
            porque pensé que me lo podía haber causado durante el
            entrenamiento.<br />
            Como la masa era de unos 6 cm, decidimos realizar una operación
            ambulatoria y enviarla a patología. Me hicieron la operación el 2 de
            febrero del 2016 y 2 semanas después tuve una cita de seguimiento
            para asegurarnos de que estaba sanando bien, resultó ser que los
            márgenes dieron resultados positivos para sarcoma de la vulva y me
            remitieron a un especialista. <br />
            Cuando cuento mi historia, mi mensaje para otras mujeres es que
            ustedes conocen su cuerpo mejor que nadie. Si hay cualquier cambio
            que no puedan entender, háganse un chequeo. Creo firmemente que el
            diagnóstico temprano me salvó la vida.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/tiffany-16x9-1.jpg" alt="Tiffany" />
      </div>
      <div class="test-info">
        <h3>Tiffany, sobreviviente de cáncer de ovario.</h3>
        <div class="test-desc">
          <p>
            En marzo del 2013, comencé a tener un poco de hinchazón abdominal y
            a aumentar de peso sin explicación. Fui a un par de médicos. Me
            hicieron una radiografía y una EGD.<br />
            Busqué a un gastroenterólogo que de inmediato palpó mi estómago y
            ordenó una tomografía computarizada. Me llamó de vuelta a su
            consultorio y me dijo: "Tiene cáncer de ovario". Quedé atónita y me
            puse histérica. Tengo la bendición de que mi tía sea enfermera
            oncológica. Ella llamó a un oncólogo que me puso en las manos de uno
            de los mejores ginecólogos oncólogos del país. Él me hizo una
            histerectomía radical y, siguiendo su recomendación, me sometí a
            seis rondas de quimioterapia. <br />
            Terminé el tratamiento en noviembre del 2013.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/eileen-16x9-1.jpg" alt="Eileen" />
      </div>
      <div class="test-info">
        <h3>
          Eileen, sobreviviente de cáncer de cuello uterino (Cérvix) y utero.
        </h3>
        <div class="test-desc">
          <p>
            En agosto del 2007, comencé a tener un sangrado abundante y acudí a
            un centro de salud cercano. Los médicos encontraron algo sospechoso
            en mi útero. Me remitieron a un ginecólogo para que me hiciera una
            biopsia, la cual reveló que tenía cáncer. Luego me remitieron a un
            ginecólogo oncólogo y al hacerme una biopsia adicional en el cuello
            uterino, descubrió también células cancerosas. A la fecha, los
            médicos no saben con seguridad si el cáncer de útero apareció antes
            del cáncer de cuello uterino o viceversa.<br />
            Me hicieron radioterapia y quimioterapia. Tuve la suerte de no
            sufrir efectos secundarios por el tratamiento. Después de la
            radiación y la quimioterapia, me hicieron una histerectomía completa
            y me sacaron los ovarios. Ahora no tengo cáncer.<br />
            Hoy en día, el cáncer ya no es una sentencia de muerte. No piensen
            que no tienen cáncer solo porque creen que no pueden pagar por la
            consulta para el diagnóstico y el tratamiento que necesiten.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/RobertSmith.jpg" alt="Roberto" />
      </div>
      <div class="test-info">
        <h3>Roberto sobreviviente de cáncer colorrectal.</h3>
        <div class="test-desc">
          <p>
            En el 2016, me di cuenta de que me estaba cansando más; pensé que
            era por los viajes. Decidí ir al médico para hacerme un chequeo. Le
            hablé sobre hacerme una colonoscopia, aunque no había tenido ningún
            síntoma, además de sentirme cansado. Quería hacerme una prueba de
            detección porque habían pasado 7 años desde mi última colonoscopia.
            Además, mi padre tuvo cáncer de colon cuando tenía solamente 45 años
            y sobrevivió. Hoy en día mi padre tiene 75 años y su salud es
            relativamente buena.<br />
            Me hice la colonoscopia el 10 de enero del 2017 y el médico tomó
            muestras de tejido para realizar una biopsia. Una semana más tarde,
            llegaron los resultados y mostraron que sí tenía cáncer de colon. El
            2 de febrero del 2017, me operaron para extirpar el cáncer.<br />
            Afortunadamente, debido a que el cáncer fue hallado lo
            suficientemente temprano, la operación fue exitosa. Pero nunca lo
            hubieran encontrado de forma temprana si yo no me hubiera hecho la
            prueba de detección.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Leer testimonio completo ▼
        </button>
      </div>
    </div>

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

      function toggleTestimonio(button) {
        const desc = button.previousElementSibling;
        const expanded = desc.classList.toggle("expanded");
        button.textContent = expanded
          ? "Leer menos ▲"
          : "Leer testimonio completo ▼";
      }
    </script>
    <script src="../../JS/site.js" defer></script>
  </body>
</html>