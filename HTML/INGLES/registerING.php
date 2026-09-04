<?php
/*------------------ REGISTER USER (ENGLISH) -------------------*/
session_start();
// Check if session is already active
if (isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    // Si estás en la carpeta INGLES, regresar a la raíz principal si es español
    $redirectUrl = $isEnglish ? "PrincipalING.php" : "../Principal.php";
    
    header("Location: " . $redirectUrl);
    exit; 
}
require __DIR__ . '/../../PHP/conexion.php';

$error   = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre     = trim($_POST["name"] ?? "");
    $usuario    = trim($_POST["usuario"] ?? "");
    $contrasena = trim($_POST["contrasena"] ?? "");

    /* ---------- 1. Validation ---------- */
    if (empty($nombre) || empty($usuario) || empty($contrasena)) {
        $error = "All required fields must be filled out.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $usuario)) {
        $error = "Username must be between 4 and 20 characters (letters, numbers, or underscore).";
    } elseif (mb_strlen($contrasena) < 6) {
        $error = "Password must be at least 6 characters long.";
    } else {
        
        /* ---------- 2. Check if user already exists ---------- */
        $stmt = $conectar->prepare("SELECT id FROM usuarios WHERE usuario = ? LIMIT 1");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error = "That username is already in use. Please choose another.";
        } else {
            
            /* ---------- 3. Insert new user ---------- */
            $hash  = password_hash($contrasena, PASSWORD_DEFAULT);
            $fecha = date("Y-m-d");
            
            $sql = "INSERT INTO usuarios (nombre, usuario, contrasena, fecha_registro) VALUES (?, ?, ?, ?)";
            $stmt = $conectar->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $usuario, $hash, $fecha);

            if ($stmt->execute()) {
                $success = true;
            } else {
                $error = "Registration could not be completed. Please try again.";
            }
        }
        $stmt->close(); 
    }
}

$loginUrl = "loginING.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/register.css" />
    <link rel="icon" type="image/png" href="../../MULTIMEDIA/Canrisk LOGO.svg" />
  </head>
  <body>
    <?php if ($success): ?>
    <script>
        alert("Successful registration! You can now log in.");
        window.location.href = <?php echo json_encode($loginUrl); ?>;
    </script>
    <?php endif; ?>

    <!-- LOGIN / REGISTER CARD -->
    <div class="form">
      <!-- Logo and brand -->
      <a class="auth-brand" href="PrincipalING.php">
        <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" />
        <span>Canrisk</span>
      </a>
      <!-- Form -->
      <form action="" method="POST" novalidate>
        <h1>Create your Canrisk account</h1>
        <?php if (!empty($error)): ?>
            <div class="auth-error" role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>
        <?php endif; ?>
        <span class="auth-subtitle">Sign up to unlock all the content</span>

        <div class="field-group">
          <label class="User-text" for="name">Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" class="name"
                 value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>"
                 minlength="3" maxlength="50" required />
        </div>

        <div class="field-group">
          <label class="User-text" for="usuario">User:</label>
          <input type="text" id="usuario" name="usuario" placeholder="Enter your username" class="username"
                 value="<?php echo htmlspecialchars($_POST['usuario'] ?? '', ENT_QUOTES); ?>"
                 pattern="[a-zA-Z0-9_]{4,20}" maxlength="20" required />
        </div>

        <div class="field-group">
          <label class="User-text" for="contrasena">Password:</label>
          <input type="password" id="contrasena" name="contrasena" placeholder="Enter your password" class="password"
                 minlength="6" required />
        </div>

        <div class="submit-bttn">
          <button type="submit" class="submit-bttn" id="submit-bttn">Create account</button>
        </div>

        <button type="button" class="regresar" onclick="window.history.back()">Go back</button>

        <div class="register">
          <a class="resgis-txt" href="loginING.php">Already have an account?<br />Log in to Canrisk</a>
        </div>
      </form>
    </div>

    <script src="../../JS/auth-validacion.js"></script>
  </body>
</html>