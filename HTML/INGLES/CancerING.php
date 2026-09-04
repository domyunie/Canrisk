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
    <title>Cancer Information - Canrisk</title>
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

    <!-- SIDEBAR MENU  -->
    <nav class="sidebar-menu" id="sidebarMenu">
      <div class="sidebar-decoracion">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <ul class="sidebar-list">
        <li>
          <a href="../INGLES/cancer-introING.php"
            >Introduction to Cancer &rarr;</a
          >
        </li>
        <li><a href="../INGLES/CancerING.php">Types of Cancer &rarr;</a></li>
        <li>
          <a href="../INGLES/psycho-helpING.php"
            >Psychological Support &rarr;</a
          >
        </li>
        <li><a href="../INGLES/helpING.php">Help Center &rarr;</a></li>
        <li><a href="../INGLES/quizzING.php">Quiz &rarr;</a></li>
        <li>
          <a href="..//INGLES/faqING.php">Frequently Asked Questions &rarr;</a>
        </li>
      </ul>
    </nav>

    <div class="overlay-menu" id="menuOverlay"></div>

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
          <h4><a href="../INGLES/PrincipalING.php">Home</a></h4>
        </li>
        <li class="box-II">
          <a href="../INGLES/aboutusENG.php"><h4>About Us</h4></a>
        </li>
        <li class="box-II">
          <a href="../INGLES/ContactoING.php"><h4>Contact Us</h4></a>
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
        <h2>Know, Detect, Prevent</h2>
        <p>
          A detailed medical guide to the most commonly diagnosed types of
          cancer worldwide. Education and prevention are our best allies for
          health.
        </p>
      </div>

      <div class="cancer-tabs" role="tablist">
        <a href="#mama" class="tab-link" data-target="mama">Breast</a>
        <a href="#cervix" class="tab-link" data-target="cervix">Cervix</a>
        <a href="#prostata" class="tab-link" data-target="prostata">Prostate</a>
        <a href="#pulmon" class="tab-link" data-target="pulmon">Lung</a>
        <a href="#estomago" class="tab-link" data-target="estomago">Stomach</a>
        <a href="#colon" class="tab-link" data-target="colon">Colorectal</a>
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
          <h3>Breast Cancer</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>What is it?</summary>
            <div class="accordion-card-content">
              <p>
                Breast cancer is a disease in which cells in the breast tissue
                mutate and multiply uncontrollably, usually giving rise to a
                malignant tumor. It can originate either in the milk ducts
                (ductal carcinoma, the most common type) or in the glandular
                lobules (lobular carcinoma). Although it mainly affects women
                from their forties onward, men can also develop it in a smaller
                percentage of cases (about 1%).
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Risk factors</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Advanced age:</strong> Risk increases significantly
                  from age 40 to 50 onward.
                </li>
                <li>
                  <strong>Genetics and family history:</strong> Inherited
                  mutations in the BRCA1 and BRCA2 genes, or direct family
                  history of breast or ovarian cancer.
                </li>
                <li>
                  <strong>Hormonal and reproductive factors:</strong> Early
                  menarche (before age 12) or late menopause (after age 55), as
                  well as prolonged exposure to hormone replacement therapy.
                </li>
                <li>
                  <strong>Lifestyle:</strong> Frequent alcohol consumption,
                  being overweight or obese after menopause, and a sedentary
                  lifestyle.
                </li>
                <li>
                  <strong>Radiological factors:</strong> A history of radiation
                  therapy to the chest area during youth.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Warning symptoms</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  A palpable lump, mass, or thickening in the breast or underarm
                  area, usually painless but firm.
                </li>
                <li>
                  Noticeable changes in the shape, size, or symmetry of the
                  breasts.
                </li>
                <li>
                  Changes in the skin covering the breast, such as dimpling,
                  puckering, an "orange peel" appearance, or unexplained
                  redness.
                </li>
                <li>
                  Nipple abnormalities, such as recent retraction (inversion),
                  spontaneous discharge (especially if bloody), or persistent
                  scaling.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detection and prevention</summary>
            <div class="accordion-card-content">
              <p>
                A comprehensive early-detection strategy includes monthly breast
                self-exams starting at age 20 to learn the normal structure of
                the breast, annual clinical exams by a professional, and regular
                mammograms starting at age 40. As primary prevention measures,
                it's recommended to maintain a healthy body weight, exercise
                regularly, limit or avoid alcohol consumption, and prioritize a
                diet rich in antioxidants and fiber.
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
          <h3>Cervical Cancer</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>What is it?</summary>
            <div class="accordion-card-content">
              <p>
                Also known as cervical cancer, it originates in the cells of the
                cervix (the lower part of the uterus that connects to the
                vagina). Its development is usually very slow, starting with
                precancerous lesions known as dysplasia. It's directly and
                almost exclusively linked to persistent infection by oncogenic
                types of Human Papillomavirus (HPV), with genotypes 16 and 18
                responsible for the majority of serious cases.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Risk factors</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Persistent HPV infection:</strong> Contracting high
                  oncogenic-risk strains that the immune system fails to clear
                  over time.
                </li>
                <li>
                  <strong>Sexual behavior:</strong> Early onset of sexual
                  activity and a history of multiple sexual partners (which
                  increases the likelihood of exposure to the virus).
                </li>
                <li>
                  <strong>Smoking:</strong> Smoking doubles the risk of cervical
                  cancer, since chemicals in smoke weaken the local immune
                  system of cervical tissue.
                </li>
                <li>
                  <strong>Weakened immune system:</strong> Conditions such as
                  HIV/AIDS or prolonged use of immunosuppressant medications.
                </li>
                <li>
                  <strong>Multiple pregnancies:</strong> Having had multiple
                  full-term pregnancies without frequent gynecological
                  check-ups.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Warning symptoms</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Abnormal, unexpected vaginal bleeding, such as bleeding after
                  intercourse, bleeding between regular periods, or bleeding
                  after menopause.
                </li>
                <li>
                  Unusual vaginal discharge, which may become persistent,
                  watery, thick, or streaked with blood and have a foul odor.
                </li>
                <li>
                  Constant pelvic pain, discomfort, or a feeling of heaviness in
                  the lower abdomen.
                </li>
                <li>
                  Discomfort or sharp pain during intercourse (dyspareunia).
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detection and prevention</summary>
            <div class="accordion-card-content">
              <p>
                The Pap smear (vaginal cytology) and molecular tests for HPV DNA
                detection are highly effective tools capable of identifying
                lesions before they become malignant. Primary prevention
                includes preventive HPV vaccination given to preadolescents
                before the start of sexual activity, correct and consistent use
                of barrier methods (condoms), and reducing tobacco use.
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
          <h3>Prostate Cancer</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>What is it?</summary>
            <div class="accordion-card-content">
              <p>
                Prostate cancer develops in the prostate gland in men, a small
                walnut-shaped organ located below the bladder whose main
                function is to produce the seminal fluid that nourishes and
                transports sperm. It's one of the most commonly diagnosed tumors
                in the male population. The vast majority of cases are
                adenocarcinomas and are characterized by an extremely slow
                progression, which allows for a very favorable prognosis when
                diagnosed early.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Risk factors</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Advancing age:</strong> Incidence increases
                  exponentially from age 50 onward.
                </li>
                <li>
                  <strong>Family history:</strong> Having a father or brother
                  diagnosed with prostate cancer doubles or triples personal
                  risk.
                </li>
                <li>
                  <strong>Ethnic background:</strong> Men of African descent
                  have a notably higher incidence and aggressiveness rate
                  compared to other ethnic groups.
                </li>
                <li>
                  <strong>Diet and metabolism:</strong> Eating patterns high in
                  saturated animal fats and low in fruits, vegetables, and
                  lycopene, combined with a sedentary lifestyle.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Warning symptoms</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Frequent urination problems, especially a slow, weak, or
                  intermittent urine flow that stops and starts.
                </li>
                <li>
                  A sudden, urgent need to get up multiple times during the
                  night to urinate (nocturia).
                </li>
                <li>Presence of blood traces in urine or semen.</li>
                <li>
                  Persistent discomfort, stiffness, or pain localized in the
                  lower back, hips, or upper thighs due to bone metastasis in
                  advanced stages.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detection and prevention</summary>
            <div class="accordion-card-content">
              <p>
                Preventive and early-diagnosis methods rely on an annual medical
                evaluation using the Prostate-Specific Antigen (PSA) blood test
                and a digital rectal exam starting at age 50 (or from age 45 if
                there's significant family history). It's recommended to promote
                a balanced diet rich in vegetables, cruciferous vegetables, and
                tomatoes, maintain a healthy body weight, and get regular
                medical check-ups for any urinary changes.
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
          <h3>Lung Cancer</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>What is it?</summary>
            <div class="accordion-card-content">
              <p>
                Lung cancer originates in lung tissue, usually in the cells
                lining the airways and bronchi. It's mainly divided into two
                large groups: small cell lung cancer and non-small cell lung
                cancer. It's one of the leading causes of cancer-related
                mortality worldwide, strongly associated in an overwhelming
                majority of cases with long-term tobacco use and inhaled smoke
                byproducts.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Risk factors</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Active tobacco use:</strong> Responsible for more than
                  85% of total cases due to the massive presence of carcinogenic
                  chemical agents in smoke.
                </li>
                <li>
                  <strong>Secondhand smoke:</strong> Constant inhalation of
                  ambient tobacco smoke generated by nearby smokers at home or
                  work.
                </li>
                <li>
                  <strong>Radon gas exposure:</strong> A natural radioactive gas
                  that accumulates indoors and in basements, originating from
                  soil and rocks.
                </li>
                <li>
                  <strong>Occupational and industrial risks:</strong> Chronic
                  inhalation of toxic substances such as asbestos, arsenic,
                  beryllium, nickel, soot, and diesel emissions.
                </li>
                <li>
                  <strong>Air pollution:</strong> Exposure to high levels of
                  fine particulate matter suspended in the air of large
                  industrial cities.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Warning symptoms</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  A chronic cough that lingers over time, changes tone, or
                  progressively worsens with no apparent infectious cause.
                </li>
                <li>Coughing up blood or sputum tinged with reddish tones.</li>
                <li>
                  A constant feeling of shortness of breath (dyspnea), choking,
                  or wheezing and sharp chest pain when breathing deeply.
                </li>
                <li>
                  Rapid, unexplained weight loss, chronic fatigue, generalized
                  weakness, and recurring episodes of pneumonia or bronchitis.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detection and prevention</summary>
            <div class="accordion-card-content">
              <p>
                The single most effective preventive measure is to completely
                avoid tobacco use and quit smoking as early as possible. For
                people with a high-risk smoking history (adults ages 50 to 80
                with an extensive smoking history), medical protocols recommend
                annual preventive screening with low-dose computed tomography
                (LDCT), allowing nodules to be identified at very early stages.
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
          <h3>Stomach Cancer</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>What is it?</summary>
            <div class="accordion-card-content">
              <p>
                Gastric (stomach) cancer develops when the cells lining the
                inner mucosa of the stomach begin to multiply abnormally,
                eventually forming a tumor lesion. Its progression tends to be
                slow and quiet over the years, usually preceded by chronic
                inflammatory processes such as atrophic gastritis. The
                predominant histological type is gastric adenocarcinoma, which
                responds positively to combined treatments if detected before
                invading deeper layers or nearby lymph nodes.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Risk factors</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Helicobacter pylori infection:</strong> Chronic
                  bacterial colonization of the stomach that damages the mucosa
                  and promotes cellular mutations over the long term.
                </li>
                <li>
                  <strong>Dietary habits:</strong> Frequent intake of foods
                  preserved with large amounts of salt, smoked or processed
                  meats, and low intake of fresh fruits or vegetables rich in
                  vitamin C.
                </li>
                <li>
                  <strong>Active smoking:</strong> Ingested smoke and its toxins
                  substantially increase the risk of developing tumors in the
                  gastric region.
                </li>
                <li>
                  <strong>Genetic history:</strong> Family history of gastric
                  cancer or belonging to hereditary cancer-predisposition
                  syndromes.
                </li>
                <li>
                  <strong>Prior conditions:</strong> Chronic atrophic gastritis,
                  pernicious anemia, or previous stomach surgeries for benign
                  ulcers.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Warning symptoms</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Persistent indigestion, diffuse abdominal discomfort, chronic
                  heartburn, or a constant burning sensation in the upper
                  abdomen.
                </li>
                <li>
                  A feeling of fullness or early satiety after eating very small
                  portions of food.
                </li>
                <li>
                  Sudden weight loss, loss of appetite, and sudden aversion to
                  certain foods (such as red meat).
                </li>
                <li>
                  Frequent episodes of nausea, recurring vomiting, and dark
                  stools (melena) or vomit with traces of blood.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detection and prevention</summary>
            <div class="accordion-card-content">
              <p>
                Prevention focuses on timely medical eradication of the bacteria
                <em>Helicobacter pylori</em> through specific antibiotic
                treatments when detected, adopting a diet rich in fresh
                products, strictly reducing preservatives and salt, and avoiding
                tobacco use. In patients with high symptomatic risk or direct
                family history, an upper digestive endoscopy allows for a
                precise, early diagnosis.
              </p>
            </div>
          </details>
        </div>
      </section>

      <section class="cancer-section" id="colon">
        <div class="cancer-header">
          <div class="icono-cancer" aria-hidden="true">
            <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.8"
            >
              <path
                d="M6 4c-1.5 0-2.5 1.2-2.5 2.5S4.5 9 6 9h1M6 9c-1.5 0-2.5 1.2-2.5 2.5S4.5 14 6 14h4M18 20c1.5 0 2.5-1.2 2.5-2.5S19.5 15 18 15h-1M18 15c1.5 0 2.5-1.2 2.5-2.5S19.5 10 18 10h-8"
              />
            </svg>
          </div>
          <h3>Colorectal Cancer</h3>
        </div>

        <div class="cancer-accordion">
          <details class="accordion-card">
            <summary>What is it?</summary>
            <div class="accordion-card-content">
              <p>
                Colorectal cancer includes malignant tumors that develop in the
                colon or rectum, the final part of the digestive system. In most
                cases, it begins as a polyp, a benign growth of tissue on the
                intestinal wall that, over the years, can become cancerous if
                not detected and removed in time. It's one of the most
                preventable types of cancer, precisely because its precancerous
                stage (the polyp) is easily identified through endoscopic
                studies.
              </p>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Risk factors</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  <strong>Age:</strong> Risk increases notably after age 50,
                  although cases in younger people are on the rise.
                </li>
                <li>
                  <strong>Family and personal history:</strong> Previous polyps,
                  inflammatory bowel disease (ulcerative colitis or Crohn's), or
                  first-degree relatives with colorectal cancer.
                </li>
                <li>
                  <strong>Diet:</strong> Diets high in red and processed meats
                  and low in fiber, fruits, and vegetables.
                </li>
                <li>
                  <strong>Lifestyle:</strong> Sedentary habits, obesity,
                  smoking, and high alcohol consumption.
                </li>
                <li>
                  <strong>Type 2 diabetes:</strong> Associated with a moderately
                  higher risk of developing this type of cancer.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Warning symptoms</summary>
            <div class="accordion-card-content">
              <ul>
                <li>
                  Persistent changes in bowel habits, such as diarrhea,
                  constipation, or altered stool consistency lasting several
                  weeks.
                </li>
                <li>Blood in the stool or rectal bleeding.</li>
                <li>
                  Continuous abdominal discomfort, such as cramping, gas, or
                  pain that doesn't go away.
                </li>
                <li>
                  A feeling that the bowel doesn't empty completely, weakness,
                  fatigue, and weight loss with no apparent cause.
                </li>
              </ul>
            </div>
          </details>

          <details class="accordion-card">
            <summary>Detection and prevention</summary>
            <div class="accordion-card-content">
              <p>
                Colonoscopy is the gold-standard tool, since it can detect and
                remove polyps before they become cancerous; it's recommended
                starting at age 45–50, or earlier if there's family history.
                Other complementary tests include the fecal occult blood test.
                Preventive measures include increasing fiber, fruit, and
                vegetable intake, reducing processed meats, staying physically
                active, and avoiding tobacco and excessive alcohol.
              </p>
            </div>
          </details>
        </div>
      </section>

      <div class="cancer-lema">
        <p>
          Early detection is the best tool against cancer. Always consult with a
          healthcare professional.
        </p>
      </div>

      <!-- DIAGNOSIS PATH -->
      <div class="diagnosis-path">
        <h2>🧭 What happens after noticing a symptom?</h2>
        <p class="sub">
          A general guide to the process — each case may vary depending on
          medical judgment
        </p>
        <div class="timeline">
          <div class="timeline-step">
            <div class="step-circle">1</div>
            <h4>Initial consultation</h4>
            <p>
              You visit a general practitioner and explain the symptoms you've
              noticed.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">2</div>
            <h4>Screening tests</h4>
            <p>
              Lab tests, imaging, or specific studies are ordered depending on
              the case.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">3</div>
            <h4>Biopsy</h4>
            <p>
              If there's a suspicious lesion, a small tissue sample is taken for
              analysis.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">4</div>
            <h4>Diagnosis and staging</h4>
            <p>
              The medical team confirms the diagnosis and determines what stage
              it's at.
            </p>
          </div>
          <div class="timeline-step">
            <div class="step-circle">5</div>
            <h4>Treatment plan</h4>
            <p>
              A personalized plan is defined together with oncology specialists.
            </p>
          </div>
        </div>
      </div>

      <!--  MEDICAL GLOSSARY  -->
      <div class="glossary-section">
        <h2>Basic medical glossary</h2>
        <p class="sub">
          Terms that come up frequently when talking about cancer, explained in
          plain language
        </p>
        <dl class="glossary-grid">
          <div class="glossary-term">
            <dt>Benign tumor</dt>
            <dd>
              A growth of cells that does not invade other tissues or spread to
              other parts of the body.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Malignant tumor</dt>
            <dd>
              A growth of cells capable of invading nearby tissues and spreading
              to other areas of the body.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Metastasis</dt>
            <dd>
              The process by which cancer cells break away from the original
              tumor and form new tumors in other parts of the body.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Biopsy</dt>
            <dd>
              Removal of a small tissue sample to examine under a microscope and
              confirm whether it contains cancer cells.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Adenocarcinoma</dt>
            <dd>
              A type of cancer that originates in glandular cells, found in
              organs such as the breast, prostate, lung, or stomach.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Chemotherapy</dt>
            <dd>
              Treatment with medications aimed at destroying or slowing the
              growth of cancer cells in the body.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Radiation therapy</dt>
            <dd>
              Use of high-energy radiation aimed at a specific area to destroy
              cancer cells or shrink tumors.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Screening</dt>
            <dd>
              Tests performed on people without symptoms to detect possible
              signs of cancer at very early stages.
            </dd>
          </div>
          <div class="glossary-term">
            <dt>Remission</dt>
            <dd>
              The decrease or disappearance of cancer signs and symptoms, either
              partially or completely.
            </dd>
          </div>
        </dl>
        <p class="glossary-note">
          This glossary is for informational purposes only and does not replace
          an explanation from a healthcare professional about your particular
          case.
        </p>
      </div>
    </main>
    <!--  FOOTER -->
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
