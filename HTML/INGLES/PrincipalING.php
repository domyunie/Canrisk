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
    <title>Home - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/Style-Info.css" />
    <link rel="stylesheet" href="../../CSS/principal.css" />
    <link
      rel="icon"
      type="image/png"
      href="../../MULTIMEDIA/Canrisk LOGO.svg"
    />
  </head>
  <body>
    <!--  LOGO AND SIDEBAR MENU BUTTON  -->
    <div class="navbar-brand">
      <button
        class="hamburger-sidebar-btn"
        id="sidebarBtn"
        aria-label="Open sidebar menu"
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

    <!--  DARK OVERLAY WHEN SIDEBAR OPENS  -->
    <div class="overlay-menu" id="menuOverlay"></div>

    <!--  TOP NAVIGATION BAR -->
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
          <h4><a href="../INGLES/PrincipalING.php">Home Page</a></h4>
        </li>
        <li class="box-II">
          <a href="../INGLES/aboutusENG.php"><h4>About us</h4></a>
        </li>
        <li class="box-II">
          <a href="../INGLES/ContactoING.php"><h4>Contact us</h4></a>
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

    <!--  PAGE HEADER -->
    <header class="hero-section">
      <div class="hero-container">
        <h1 class="hero-title">Awareness, Support, and Hope</h1>
        <p class="hero-subtitle">
          Welcome to Canrisk. We're a platform dedicated to providing prevention
          tools, emotional support, and assistance for young people and families
          going through oncology treatment.
        </p>
        <a href="cancerING.php" class="btn-cancer">
          <span>Learn About Cancer Types</span> &rarr;
        </a>
      </div>
    </header>

    <!--  QUICK STATS  -->
    <br /><br />
    <div class="home-stats">
      <div class="home-stat-box">
        <span class="stat-icon">🎗️</span>
        <span class="stat-number">6</span>
        <span class="stat-label">types of cancer explained in detail</span>
      </div>
      <div class="home-stat-box">
        <span class="stat-icon">💬</span>
        <span class="stat-number">10</span>
        <span class="stat-label">real testimonials from survivors</span>
      </div>
      <div class="home-stat-box">
        <span class="stat-icon">🤝</span>
        <span class="stat-number">100%</span>
        <span class="stat-label">free, informational support</span>
      </div>
    </div>

    <section class="info-row-container">
      <h2 class="info-row-title">Support Along the Way</h2>
      <div class="fila-texto-img">
        <div class="content-text">
          <div class="Start">
            <p>
              To support someone with cancer, the key is authentic presence and
              avoiding forced positivity that dismisses their fears. Listen
              actively without judgment, letting the person express their
              sadness or anger safely. Instead of asking "how can I help?",
              offer concrete actions like bringing food, cleaning, or running
              specific errands.
            </p>
          </div>
        </div>

        <div class="IMG">
          <div class="flip-card" onclick="this.classList.toggle('flipped')">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img
                  src="../../MULTIMEDIA/image 5.png"
                  alt="Support and empathy"
                  class="IMG-TXT"
                />
              </div>
              <div class="flip-card-back">
                <p>
                  Always respect their autonomy, treating them as the person
                  they are and not just as a patient in treatment. Avoid giving
                  unsolicited medical advice or telling stories about other
                  cases that create unnecessary pressure. Quiet companionship is
                  often more comforting than stock phrases or motivational
                  speeches.
                </p>
              </div>
            </div>
            <span class="flip-hint">Tap the image to see more tips</span>
          </div>
        </div>
      </div>
    </section>

    <!--Faith testimonials-->

    <div class="title">
      <div class="hero-container">
        <h1 class="hero-title">Testimonials of Faith</h1>
        <p class="hero-subtitle">
          <strong
            >In this section you'll find testimonials from warriors who beat
            cancer. Never lose hope.</strong
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
        <h3>Ana María, lung cancer survivor.</h3>
        <div class="test-desc">
          <p>
            <strong
              >If I ever need to fight again, I've got my gloves put away,
              ready.</strong
            ><br />
            I'm Ana María, a stage 4 lung cancer survivor, and I've been
            cancer-free for 6 months.<br />
            My son-in-law is an oncologist, and at times it was helpful to have
            a doctor in the family who understood the topic, but at other times
            it wasn't so helpful.<br />
            Nothing negative works for me. And since everything felt negative,
            at one point I had to sit down with him and explain that I don't
            function with negative things, his percentages and his statistics.
            Those don't help me because that's not how I operate. Once I
            explained that it hurt me and wasn't useful to me, thankfully he was
            able to understand, even though it was hard for him.<br />
            Staying positive and surrounding yourself with good people and
            things is a huge help. If you can face the illness, you can face a
            person, or several, who bring negativity.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/juan luis tintaya-1.webp" alt="Juan Luis" />
      </div>
      <div class="test-info">
        <h3>Juan Luis, tongue cancer survivor.</h3>
        <div class="test-desc">
          <p>
            About 4 years ago, Juan Luis Tintaya started having discomfort in
            his tongue. Sores appeared and it burned. He hoped the symptoms
            would go away, but they didn't, and after two months he went to see
            a doctor. The head and neck specialist ordered a biopsy to rule out
            a malignant tumor.<br />
            The result came back positive for cancer of the tongue, floor of the
            mouth, and lymph nodes. Juan Luis was 41 at the time and worked a
            lot. This news, however, put a pause on his career and he focused on
            his health. He had surgery, followed by chemotherapy and
            radiation.<br />
            His cancer treatment lasted 3 months. It was short but intense. The
            affected area was successfully removed, and the lymph nodes were
            taken out too. He had 33 radiation sessions and received three
            strong doses of chemotherapy. After that, he was doing well.<br />
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/felix salomon-1.webp" alt="Felix Salomon" />
      </div>
      <div class="test-info">
        <h3>Felix Salomon, prostate cancer survivor.</h3>
        <div class="test-desc">
          <p>
            Félix Salomon was diagnosed with prostate cancer in 2009, at age 61.
            Unfortunately, he went through a case of medical malpractice, and
            afterward went to a different hospital, where he underwent the
            proper tests and had another operation.<br />
            After that operation, Mr. Salomon kept up with his medical checkups,
            and thanks to that good habit, a recurrence of the cancer was caught
            early, in 2012. He went through 36 radiotherapy sessions and is now
            checked once a year.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/felipe yanes-1.webp" alt="Felipe Yanes" />
      </div>
      <div class="test-info">
        <h3>Felipe Yanes, prostate cancer survivor.</h3>
        <div class="test-desc">
          <p>
            9 years ago, Felipe Yanes found out he had prostate cancer thanks to
            the routine medical checkups he was in the habit of getting. His
            great sense of humor and positive outlook on life worked in his
            favor throughout his treatment.<br />
            Here's his testimony as a cancer patient: "When they did my biopsy,
            true to my style, I told the doctors: If it's bingo, write down the
            number, because it has to be a prize-winner. They laughed. And sure
            enough, it was cancer. I didn't get depressed, I trusted the
            doctors, and I went through with the surgery they recommended."<br />
            Yanes didn't need chemotherapy or radiotherapy — in his case,
            surgery alone was enough. Since then he has kept up with his
            checkups very consistently and advises everyone to do the same,
            since that's how cancer can be caught in its early stages.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/amy-16x9-1.jpg" alt="Amy" />
      </div>
      <div class="test-info">
        <h3>Amy, cervical cancer survivor.</h3>
        <div class="test-desc">
          <p>
            Before I got my cancer diagnosis, my health had always been very
            good. I never had any serious problems and my menstrual cycle was
            normal. Then, in November 2011, I had significant vaginal bleeding
            for about a week, followed by a complete absence of my period the
            following month, which wasn't normal for me.<br />
            Over time, and through treatment, I learned to treat myself better.
            I listen to my body. When I'm tired, I rest. When I'm sad, I cry.
            When I'm happy, I laugh. I'm still getting to know my "new" body.
            Sometimes it works well, sometimes it doesn't. But I'm alive, I'm
            well, and I'm surrounded by the people I love most!
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/cindy-16x9-1.jpg" alt="Cindy" />
      </div>
      <div class="test-info">
        <h3>Cindy, cervical cancer survivor.</h3>
        <div class="test-desc">
          <p>
            It was around Christmas that I went in for one of my routine
            screening tests. I didn't think much of it because it was just a
            routine appointment, like so many before. But I'll never forget the
            call I got from the doctor afterward: the Pap smear had come back
            abnormal, and there were precancerous cells in the sample they'd
            taken.<br />
            I decided to go through with a procedure to remove the cells. I
            remember resting at home during my recovery and feeling so grateful
            for that appointment. If I hadn't gone, the future could have looked
            very different for me.<br />
            People hear the word "cancer" and wonder, "Will I survive it? Will I
            have to live with this forever?" But I know that doesn't always have
            to be the case. We can catch these problems early, prevent cancer
            before it starts, and then recover and reach our full potential in
            life.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/brittany-16x9-1.jpg" alt="Brittany" />
      </div>
      <div class="test-info">
        <h3>Brittany, vulvar cancer survivor.</h3>
        <div class="test-desc">
          <p>
            In September 2015, I was finishing up my studies at the Squadron
            Officer School when I noticed a lump on my vulva one day stepping
            out of the shower. I didn't pay much attention to it at first
            because I thought it might have come from training.<br />
            Since the mass was about 6 cm, we decided to do an outpatient
            procedure and send it to pathology. I had the surgery on February 2,
            2016, and two weeks later I had a follow-up appointment to make sure
            I was healing well. It turned out the margins came back positive for
            vulvar sarcoma, and I was referred to a specialist. <br />
            When I share my story, my message to other women is that you know
            your body better than anyone. If there's any change you can't
            explain, get checked out. I firmly believe that early diagnosis
            saved my life.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/tiffany-16x9-1.jpg" alt="Tiffany" />
      </div>
      <div class="test-info">
        <h3>Tiffany, ovarian cancer survivor.</h3>
        <div class="test-desc">
          <p>
            In March 2013, I started having some unexplained abdominal bloating
            and weight gain. I saw a couple of doctors. They did an X-ray and an
            EGD.<br />
            I found a gastroenterologist who immediately felt my stomach and
            ordered a CT scan. He called me back into his office and told me:
            "You have ovarian cancer." I was in shock and became hysterical. I'm
            blessed that my aunt is an oncology nurse. She called an oncologist
            who put me in the hands of one of the best gynecologic oncologists
            in the country. He performed a radical hysterectomy on me, and on
            his recommendation, I went through six rounds of chemotherapy.
            <br />
            I finished treatment in November 2013.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/eileen-16x9-1.jpg" alt="Eileen" />
      </div>
      <div class="test-info">
        <h3>Eileen, cervical and uterine cancer survivor.</h3>
        <div class="test-desc">
          <p>
            In August 2007, I started having heavy bleeding and went to a nearby
            health center. The doctors found something suspicious in my uterus.
            I was referred to a gynecologist for a biopsy, which revealed that I
            had cancer. I was then referred to a gynecologic oncologist, and
            after an additional biopsy on my cervix, he also found cancer cells
            there. To this day, doctors aren't sure whether the uterine cancer
            appeared before the cervical cancer or the other way around.<br />
            I went through radiation and chemotherapy. I was lucky not to suffer
            side effects from the treatment. After radiation and chemotherapy, I
            had a full hysterectomy and my ovaries were removed. I'm now
            cancer-free.<br />
            Nowadays, cancer is no longer a death sentence. Don't assume you
            can't get checked just because you think you can't afford the
            diagnosis and treatment you need.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
      </div>
    </div>
    <br />
    <div class="test-card">
      <div class="test-photo">
        <img src="../../MULTIMEDIA/RobertSmith.jpg" alt="Roberto" />
      </div>
      <div class="test-info">
        <h3>Roberto, colorectal cancer survivor.</h3>
        <div class="test-desc">
          <p>
            In 2016, I noticed I was getting more tired; I thought it was from
            traveling. I decided to see a doctor for a checkup. I brought up
            getting a colonoscopy, even though I hadn't had any symptoms besides
            feeling tired. I wanted to get screened because it had been 7 years
            since my last colonoscopy. Also, my father had colon cancer when he
            was only 45 and survived. Today my father is 75 and in relatively
            good health.<br />
            I had the colonoscopy on January 10, 2017, and the doctor took
            tissue samples for a biopsy. A week later, the results came back
            showing that I did have colon cancer. On February 2, 2017, I had
            surgery to remove it.<br />
            Fortunately, because the cancer was caught early enough, the surgery
            was successful. But it never would have been caught early if I
            hadn't gotten screened.
          </p>
        </div>
        <button class="test-toggle" onclick="toggleTestimonio(this)">
          Read full testimonial ▼
        </button>
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
              <li>&copy; All rights reserved by the Canrisk team</li>
              <li>Special thanks to the Canrisk team</li>
              <li>who have made this page possible.</li>
            </ul>
          </div>
          <div class="footer-col">
            <h2 class="Title_1">IMPORTANT INFORMATION</h2>
            <ul class="Advice_1">
              <li>
                This page does NOT replace the help of a medical professional.
              </li>
              <li>If you have an emergency or a symptom, you can</li>
              <li>rely on the different hospital numbers we</li>
              <li>provide, or call 911 directly.</li>
            </ul>
          </div>
        </div>
        <div class="footer-social">
          <h2 class="Title_2">Canrisk's social media!</h2>
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
          ? "Read less ▲"
          : "Read full testimonial ▼";
      }
    </script>
    <script src="../../JS/site.js" defer></script>
  </body>
</html>
