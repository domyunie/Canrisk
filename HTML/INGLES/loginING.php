<?php
session_start();
// Check if session is started
if (isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    $redirectUrl = $isEnglish ? "PrincipalING.php" : "../Principal.php";
    
    header("Location: " . $redirectUrl);
    exit; 
}

require __DIR__ . '/../../PHP/conexion.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario    = trim($_POST["usuario"] ?? "");
    $contrasena = $_POST["contrasena"] ?? "";

    // Validation
    if (empty($usuario) || empty($contrasena)) {
        $error = "Username and password are required.";
    } else {
        
        /* ---------- 2. Secure user search ---------- */
        $stmt = $conectar->prepare(
            "SELECT id, nombre, usuario, contrasena FROM usuarios WHERE usuario = ? LIMIT 1"
        );
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        $stmt->close();

        /* ---------- 3. Verify hash and create session ---------- */
        if ($fila && password_verify($contrasena, $fila["contrasena"])) {
            
            // Session security
            session_regenerate_id(true);
            $_SESSION["userSession"] = [
                "type"     => "users",
                "id"       => (int) $fila["id"],
                "username" => $fila["usuario"],
                "nombre"   => $fila["nombre"],
            ];

            $redirectUrl = "PrincipalING.php";

            header("Location: " . $redirectUrl);
            exit;
        } else {
            // Error
            $error = "Incorrect username or password.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/register.css" />
    <link rel="icon" type="image/png" href="../../MULTIMEDIA/Canrisk LOGO.svg" />
  </head>
  <body>
    <!-- LOGIN / REGISTER CARD  -->
    <div class="form">
      <!-- Logo and brand -->
      <a class="auth-brand" href="PrincipalING.php">
        <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk" />
        <span>Canrisk</span>
      </a>
      <!-- Form -->
      <form action="" method="POST" novalidate>
        <h1>Log in to Canrisk</h1>
        <?php if (!empty($error)): ?>
            <div class="auth-error" role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>
        <?php endif; ?>
        <span class="auth-subtitle">Enter your details to continue</span>

        <div class="field-group">
          <label class="User-text" for="usuario">User:</label>
          <input type="text" id="usuario" name="usuario" placeholder="Enter your username" class="username"
                 value="<?php echo htmlspecialchars($_POST['usuario'] ?? '', ENT_QUOTES); ?>"
                 maxlength="20" required />
        </div>

        <div class="field-group">
          <label class="User-text" for="contrasena">Password:</label>
          <input type="password" id="contrasena" name="contrasena" placeholder="Enter your password" class="password" required />
        </div>

        <div class="submit-bttn">
          <button type="submit" class="submit-bttn" id="submit-bttn">Enter!</button>
        </div>

        <button type="button" class="regresar" onclick="window.history.back()">Go back</button>

        <div class="register">
          <a class="resgis-txt" href="registerING.php">Don't have an account?<br />Sign up here</a>
        </div>
      </form>
    </div>

    <script src="../../JS/auth-validacion.js"></script>
  </body>
</html>