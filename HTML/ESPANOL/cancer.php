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
    <title>Información sobre el Cáncer - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/cancer.css" />
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

    <!-- FONDO OSCURO AL ABRIR EL SIDEBAR  -->
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

    <main class="cancer-main">
      <div class="cancer-intro">
        <h2>Conoce, Detecta, Previene</h2>
        <p>
          Guía médica detallada sobre los tipos de cáncer más diagnosticados a
          nivel mundial. La educación y la prevención son nuestras mejores
          aliadas para la salud.
        </p>
      </div>

      <div class="cancer-tabs" role="tablist">
        <a href="#mama" class="tab-link" data-target="mama">Mama</a>
        <a href="#cervix" class="tab-link" data-target="cervix">Cérvix</a>
        <a href="#prostata" class="tab-link" data-target="prostata">Próstata</a>
        <a href="#pulmon" class="tab-link" data-target="pulmon">Pulmón</a>
        <a href="#estomago" class="tab-link" data-target="estomago">Estómago</a>
      </div>

      <section class="cancer-section" id="mama">
        <div class="cancer-header">
          <div class="icono-cancer" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M12 21s-7-4.35-9.5-9C.8 8.1 2.6 4 6.5 4c2 0 3.3 1.1 4 2.2C11.2 5.1 12.5 4 14.5 4 18.4 4 20.2 8.1 18.5 12 16 16.65 12 21 12 21z"
              />
            </svg>
          </div>
          <h3>Cáncer de mama</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>¿Qué es?</summary>
            <div class="accordion-card-content">
              <p>
                El cáncer de mama es una enfermedad en la cual las células del
                tejido mamario mutan y se multiplican sin control, dando lugar
                habitualmente a un tumor maligno. Puede originarse tanto en los
                conductos lácteos (carcinoma ductal, el más común) como en los
                lobulillos glandulares (carcinoma lobulillar). Aunque afecta
                principalmente a mujeres a partir de la cuarta década de vida,
                los hombres también pueden desarrollarlo en un porcentaje menor
                (aproximadamente el 1% de los casos).
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Factores de riesgo</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Edad avanzada:</strong> El riesgo aumenta
                  significativamente a partir de los 40 a 50 años.
                </li>
                <li>
                  <strong>Genética y antecedentes familiares:</strong> Presencia
                  de mutaciones heredadas en los genes BRCA1 y BRCA2, o
                  antecedentes directos de cáncer de mama u ovarios.
                </li>
                <li>
                  <strong>Factores hormonales y reproductivos:</strong>
                  Menarquia temprana (antes de los 12 años) o menopausia tardía
                  (después de los 55 años), así como la exposición prolongada a
                  terapias de reemplazo hormonal.
                </li>
                <li>
                  <strong>Estilo de vida:</strong> Consumo frecuente de alcohol,
                  sobrepeso u obesidad tras la menopausia, y el sedentarismo.
                </li>
                <li>
                  <strong>Factores radiológicos:</strong> Historial de
                  tratamientos con radioterapia en el área del tórax durante la
                  juventud.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Síntomas de alerta</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Presencia de un bulto, tumoración o engrosamiento palpable en
                  el seno o en la zona de la axila, usualmente indoloro pero
                  firme.
                </li>
                <li>
                  Alteraciones notorias en la morfología, tamaño o simetría de
                  las mamas.
                </li>
                <li>
                  Modificaciones en la piel que recubre el pecho, tales como
                  hoyuelos, fruncimientos, aspecto de "cáscara de naranja" o
                  enrojecimiento inexplicable.
                </li>
                <li>
                  Anomalías en el pezón, como su retracción reciente
                  (hundimiento), secreción espontánea (especialmente si es
                  sanguinolenta) o descamación persistente.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detección y prevención</summary>
            <div class="accordion-card-content">
              <p>
                La estrategia integral de detección temprana incluye la
                autoexploración mamaria mensual a partir de los 20 años para
                conocer la estructura normal del seno, exámenes clínicos
                profesionales anuales y la realización de mamografías periódicas
                a partir de los 40 años. Como medidas de prevención primaria se
                aconseja mantener un peso corporal saludable, realizar actividad
                física regular de forma constante, limitar o evitar el consumo
                de alcohol y priorizar una dieta rica en antioxidantes y fibra.
              </p>
            </div>
          </details>
        </div>
      </section>

      <section class="cancer-section" id="cervix">
        <div class="cancer-header">
          <div class="icono-cancer" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M12 3c-3 0-5 2-5 5v3c0 4 2 7 5 10 3-3 5-6 5-10V8c0-3-2-5-5-5z"
              />
              <circle cx="12" cy="8" r="1.5" />
            </svg>
          </div>
          <h3>Cáncer de cérvix</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>¿Qué es?</summary>
            <div class="accordion-card-content">
              <p>
                También conocido como cáncer de cuello uterino, se origina en
                las células del cuello del útero (la porción inferior que
                conecta con la vagina). Su desarrollo suele ser sumamente lento,
                comenzando primero con lesiones precancerosas conocidas como
                displasias. Está vinculado de forma directa y casi exclusiva a
                la infección persistente por tipos oncogénicos del Virus del
                Papiloma Humano (VPH), siendo los genotipos 16 y 18 los
                responsables de la mayoría de los casos graves.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Factores de riesgo</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Infección persistente por VPH:</strong> Contraer cepas
                  de alto riesgo oncogénico que el sistema inmune no logra
                  eliminar con el tiempo.
                </li>
                <li>
                  <strong>Conducta sexual:</strong> Inicio temprano de las
                  relaciones sexuales y antecedente de múltiples parejas
                  sexuales (lo que incrementa la probabilidad de exposición al
                  virus).
                </li>
                <li>
                  <strong>Tabaquismo:</strong> Fumar duplica el riesgo de
                  padecer cáncer de cérvix, ya que las sustancias del humo
                  debilitan el sistema inmunitario local del tejido cervical.
                </li>
                <li>
                  <strong>Sistema inmune deprimido:</strong> Condiciones como el
                  VIH/SIDA o el uso prolongado de medicamentos inmunosupresores.
                </li>
                <li>
                  <strong>Multiparidad:</strong> Haber tenido múltiples
                  embarazos a término sin controles ginecológicos frecuentes.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Síntomas de alerta</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Hemorragias vaginales anormales e imprevistas, tales como
                  sangrados después de mantener relaciones sexuales, hemorragias
                  entre periodos menstruales regulares o sangrado tras la
                  menopausia.
                </li>
                <li>
                  Flujo vaginal desacostumbrado, el cual puede tornarse
                  persistente, acuoso, espeso o presentar rastros de sangre y un
                  olor fétido.
                </li>
                <li>
                  Dolor pélvico constante, molestias o sensación de pesadez en
                  la zona baja del vientre.
                </li>
                <li>
                  Molestias o dolor agudo durante las relaciones sexuales
                  (dispareunia).
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detección y prevención</summary>
            <div class="accordion-card-content">
              <p>
                La prueba de Papanicolaou (citología vaginal) y las pruebas
                moleculares para la detección del ADN del VPH son herramientas
                altamente efectivas capaces de identificar lesiones antes de que
                se vuelvan malignas. La prevención principal incluye la
                vacunación preventiva contra el VPH aplicada en preadolescentes
                antes del inicio de la vida sexual activa, el uso correcto y
                consistente de métodos de barrera (preservativos) y la reducción
                del consumo de tabaco.
              </p>
            </div>
          </details>
        </div>
      </section>

      <section class="cancer-section" id="prostata">
        <div class="cancer-header">
          <div class="icono-cancer" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <circle cx="12" cy="12" r="8" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </div>
          <h3>Cáncer de próstata</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>¿Qué es?</summary>
            <div class="accordion-card-content">
              <p>
                El cáncer de próstata se desarrolla en la glándula prostática de
                los hombres, un órgano pequeño con forma de nuez situado debajo
                de la vejiga cuya función principal es producir el líquido
                seminal que nutre y transporta los espermatozoides. Es uno de
                los tumores más diagnosticados en la población masculina. La
                gran mayoría de los casos corresponden a adenocarcinoma y se
                caracterizan por una evolución sumamente lenta, lo que permite
                un pronóstico muy favorable si se diagnostica a tiempo.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Factores de riesgo</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Avanzar en edad:</strong> La incidencia se incrementa
                  de forma exponencial a partir de los 50 años.
                </li>
                <li>
                  <strong>Herencia familiar:</strong> Tener un padre o hermano
                  diagnosticado con cáncer de próstata duplica o triplica el
                  riesgo personal.
                </li>
                <li>
                  <strong>Origen étnico:</strong> Los hombres de ascendencia
                  afrodescendiente presentan una tasa de incidencia y
                  agresividad notablemente superior en comparación con otros
                  grupos étnicos.
                </li>
                <li>
                  <strong>Dieta y metabolismo:</strong> Patrones alimenticios
                  ricos en grasas saturadas animales y pobres en frutas,
                  verduras y licopenos, combinados con un estilo de vida
                  sedentario.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Síntomas de alerta</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Problemas frecuentes al orinar, especialmente un flujo
                  urinario lento, débil o que se detiene y vuelve a empezar de
                  forma intermitente.
                </li>
                <li>
                  Necesidad imperiosa y repentina de levantarse múltiples veces
                  durante la noche para vaciar la vejiga (nicturia).
                </li>
                <li>
                  Presencia de rastros de sangre tanto en la orina como en el
                  semen.
                </li>
                <li>
                  Molestias persistentes, rigidez o dolor localizado en la
                  región lumbar inferior, las caderas o la parte alta de los
                  muslos debido a metástasis óseas en etapas avanzadas.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detección y prevención</summary>
            <div class="accordion-card-content">
              <p>
                Los métodos preventivos y de diagnóstico temprano se basan en la
                evaluación médica anual mediante el análisis de sangre del
                Antígeno Prostático Específico (PSA) y el examen físico de tacto
                rectal a partir de los 50 años (o desde los 45 si existen
                antecedentes familiares de peso). Se recomienda promover una
                alimentación equilibrada rica en vegetales, crucíferas y tomate,
                mantener un peso corporal adecuado y realizar chequeos médicos
                regulares ante cualquier alteración urinaria.
              </p>
            </div>
          </details>
        </div>
      </section>

      <section class="cancer-section" id="pulmon">
        <div class="cancer-header">
          <div class="icono-cancer" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M12 3v6M9 9c-2 0-4 2-4 6 0 3 1 6 3 6 1.5 0 2-2 2-4V9zM15 9c2 0 4 2 4 6 0 3-1 6-3 6-1.5 0-2-2-2-4V9z"
              />
            </svg>
          </div>
          <h3>Cáncer de pulmón</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>¿Qué es?</summary>
            <div class="accordion-card-content">
              <p>
                El cáncer de pulmón se origina en los tejidos pulmonares,
                habitualmente en las células que recubren los conductos aéreos y
                bronquios. Se divide principalmente en dos grandes grupos:
                cáncer de pulmón de células pequeñas (microcítico) y de células
                no pequeñas (no microcítico). Representa una de las causas
                principales de mortalidad oncológica a nivel global, estando
                fuertemente asociado en una abrumadora mayoría de los casos al
                consumo prolongado de tabaco y derivados del humo inhalado.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Factores de riesgo</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Consumo activo de tabaco:</strong> Responsable de más
                  del 85% de los casos totales debido a la presencia masiva de
                  agentes químicos carcinógenos en el humo.
                </li>
                <li>
                  <strong>Tabaquismo pasivo:</strong> La inhalación constante
                  del humo de tabaco ambiental generado por fumadores cercanos
                  en el hogar o trabajo.
                </li>
                <li>
                  <strong>Exposición al gas radón:</strong> Un gas radioactivo
                  natural que se acumula en interiores y sótanos procedentes del
                  suelo y las rocas.
                </li>
                <li>
                  <strong>Riesgos laborales e industriales:</strong> Inhalación
                  crónica de sustancias tóxicas como asbesto, arsénico, berilio,
                  níquel, hollín y emisiones de diésel.
                </li>
                <li>
                  <strong>Contaminación atmosférica:</strong> Exposición a altos
                  índices de partículas finas suspendidas en el aire de grandes
                  urbes industriales.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Síntomas de alerta</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Una tos crónica que se prolonga en el tiempo, cambia de tono o
                  empeora progresivamente sin causa infecciosa aparente.
                </li>
                <li>
                  Expectoración con sangre o esputo teñido de tonos rojizos al
                  toser.
                </li>
                <li>
                  Sensación constante de falta de aire (disnea), ahogo o
                  aparición de sibilancias y dolor agudo en el pecho al respirar
                  profundamente.
                </li>
                <li>
                  Pérdida de peso rápida e injustificada, cansancio crónico,
                  debilidad generalizada y episodios recurrentes de neumonía o
                  bronquitis.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detección y prevención</summary>
            <div class="accordion-card-content">
              <p>
                La medida preventiva absoluta y más eficaz es evitar por
                completo el consumo de tabaco y abandonar el hábito de fumar de
                forma temprana. Para personas con alto historial de riesgo
                tabáquico (adultos mayores de entre 50 y 80 años con
                antecedentes extensos de fumadores), los protocolos médicos
                recomiendan tamizajes preventivos anuales mediante tomografías
                computarizadas de baja dosis (TCBD), permitiendo identificar
                nódulos en fases sumamente iniciales.
              </p>
            </div>
          </details>
        </div>
      </section>

      <section class="cancer-section" id="estomago">
        <div class="cancer-header">
          <div class="icono-cancer" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M9 3c0 2-1 3-2 4-2 2-3 4-3 7 0 4 3 7 8 7s8-3 8-6c0-2-1-3-3-3-1 0-2 1-3 1s-1-1-1-2c0-2 1-4 1-6 0-1-1-2-2-2s-2 1-3 0z"
              />
            </svg>
          </div>
          <h3>Cáncer de estómago</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>¿Qué es?</summary>
            <div class="accordion-card-content">
              <p>
                El cáncer gástrico (o de estómago) se gesta cuando las células
                que tapizan el revestimiento interno de la mucosa estomacal
                comienzan a multiplicarse de forma anómala hasta constituir una
                lesión tumoral. Su progresión suele ser sigilosa y lenta a lo
                largo de los años, precedida habitualmente por procesos crónicos
                inflamatorios como gastritis atrófica. El tipo histológico
                predominante es el adenocarcinoma gástrico, el cual responde de
                manera positiva a tratamientos combinados si se detecta antes de
                invadir capas profundas o ganglios cercanos.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Factores de riesgo</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Infección por Helicobacter pylori:</strong>
                  Colonización bacteriana crónica del estómago que daña la
                  mucosa y favorece mutaciones celulares a largo plazo.
                </li>
                <li>
                  <strong>Hábitos dietéticos:</strong> Ingesta frecuente de
                  alimentos conservados mediante grandes cantidades de salazón,
                  ahumados, carnes procesadas y baja ingesta de frutas o
                  verduras frescas ricas en vitamina C.
                </li>
                <li>
                  <strong>Tabaquismo activo:</strong> El humo y sus toxinas
                  ingeridas incrementan sustancialmente el riesgo de desarrollar
                  tumores en la región gástrica.
                </li>
                <li>
                  <strong>Antecedentes genéticos:</strong> Historia familiar de
                  cáncer gástrico o pertenecer a síndromes hereditarios de
                  predisposición al cáncer.
                </li>
                <li>
                  <strong>Patologías previas:</strong> Padecer de gastritis
                  atrófica crónica, anemia perniciosa o haberse sometido a
                  cirugías estomacales previas por úlceras benignas.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Síntomas de alerta</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Indigestión persistente, malestar abdominal difuso, acidez
                  estomacal crónica o sensación de ardor constante en la parte
                  alta del abdomen.
                </li>
                <li>
                  Sensación de llenura o saciedad precoz tras ingerir porciones
                  muy pequeñas de alimentos.
                </li>
                <li>
                  Pérdida de peso repentina, inapetencia y aversión repentina
                  hacia determinados alimentos (como las carnes rojas).
                </li>
                <li>
                  Episodios frecuentes de náuseas, vómitos recurrentes y
                  presencia de heces oscuras (melena) o vómitos con rastros
                  hemáticos.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detección y prevención</summary>
            <div class="accordion-card-content">
              <p>
                La prevención se centra en la erradicación médica oportuna de la
                bacteria <em>Helicobacter pylori</em> mediante tratamientos
                antibióticos específicos cuando se detecta, la adopción de una
                dieta rica en productos frescos, la reducción estricta de
                conservantes y sal, y evitar el tabaquismo. En pacientes con
                alto riesgo sintomático o antecedentes familiares directos, la
                realización de una endoscopia digestiva alta permite un
                diagnóstico preciso y precoz.
              </p>
            </div>
          </details>
        </div>
      </section>

      <div class="cancer-lema">
        <p>
          La detección temprana es la mejor herramienta contra el cáncer.
          Consultá siempre con un profesional de la salud.
        </p>
      </div>

      <!-- RUTA DEL DIAGNÓSTICO -->
      <div class="diagnosis-path">
        <h2>¿Qué pasa después de notar un síntoma?</h2>
        <p class="sub">
          Una guía general del proceso — cada caso puede variar según el
          criterio médico
        </p>
        <div class="timeline">
          <div class="timeline-step">
            <div class="step-circle">1</div>
            <h4>Consulta inicial</h4>
            <p>
              Acudes con un médico general y explicas los síntomas que has
              notado.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">2</div>
            <h4>Estudios de detección</h4>
            <p>
              Se solicitan exámenes de laboratorio, imágenes o estudios
              específicos según el caso.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">3</div>
            <h4>Biopsia</h4>
            <p>
              Si hay una lesión sospechosa, se toma una pequeña muestra de
              tejido para analizarla.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">4</div>
            <h4>Diagnóstico y etapa</h4>
            <p>
              El equipo médico confirma el diagnóstico y determina en qué etapa
              se encuentra.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">5</div>
            <h4>Plan de tratamiento</h4>
            <p>
              Se define un plan personalizado junto a especialistas en
              oncología.
            </p>
          </div>
        </div>
      </div>

      <!--  GLOSARIO MÉDICO  -->
      <div class="glossary-section">
        <h2>Glosario médico básico</h2>
        <p class="sub">
          Términos que aparecen frecuentemente al hablar de cáncer, explicados
          en lenguaje sencillo
        </p>
        <dl class="glossary-grid">
          <div class="glossary-term">
            <dt>Tumor benigno</dt>
            <dd>
              Crecimiento de células que no invade otros tejidos ni se propaga a
              otras partes del cuerpo.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Tumor maligno</dt>
            <dd>
              Crecimiento de células con capacidad de invadir tejidos cercanos y
              propagarse a otras zonas del cuerpo.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Metástasis</dt>
            <dd>
              Proceso mediante el cual células cancerosas se desprenden del
              tumor original y forman nuevos tumores en otras partes del cuerpo.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Biopsia</dt>
            <dd>
              Extracción de una pequeña muestra de tejido para analizarla bajo
              el microscopio y confirmar si contiene células cancerosas.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Adenocarcinoma</dt>
            <dd>
              Tipo de cáncer que se origina en las células glandulares,
              presentes en órganos como mama, próstata, pulmón o estómago.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Quimioterapia</dt>
            <dd>
              Tratamiento con medicamentos que buscan destruir o frenar el
              crecimiento de las células cancerosas en el cuerpo.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Radioterapia</dt>
            <dd>
              Uso de radiación de alta energía dirigida a un área específica
              para destruir células cancerosas o reducir tumores.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Screening (tamizaje)</dt>
            <dd>
              Pruebas realizadas a personas sin síntomas para detectar posibles
              signos de cáncer en etapas muy tempranas.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Remisión</dt>
            <dd>
              Disminución o desaparición de los signos y síntomas del cáncer, ya
              sea de forma parcial o completa.
            </dd>
          </div>
        </dl>
        <p class="glossary-note">
          Este glosario es solo informativo y no sustituye la explicación de un
          profesional de la salud sobre tu caso particular.
        </p>
      </div>
    </main>
    <!--  PIE DE PÁGINA -->
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
      document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll(".tab-link");
        const sections = document.querySelectorAll(".cancer-section");

        function showSection(targetId) {
          sections.forEach(function (section) {
            section.classList.remove("active");
            const cards = section.querySelectorAll(".info-card");
            cards.forEach((card) => card.removeAttribute("open"));
          });
          tabs.forEach(function (tab) {
            tab.classList.remove("active");
          });

          const targetSection = document.getElementById(targetId);
          if (targetSection) {
            targetSection.classList.add("active");
          }
          const targetTab = document.querySelector(
            '.tab-link[data-target="' + targetId + '"]',
          );
          if (targetTab) {
            targetTab.classList.add("active");
          }
        }

        tabs.forEach(function (tab) {
          tab.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = tab.getAttribute("data-target");
            showSection(targetId);
          });
        });

        showSection("mama");
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
      });
    </script>
    <script src="../../JS/site.js" defer></script>
  </body>
</html>
