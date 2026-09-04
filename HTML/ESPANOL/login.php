<?php
session_start();
//Verificar si la sesion esta iniciada
if (isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    $redirectUrl = $isEnglish ? "PrincipalING.php" : "Principal.php";
    
    header("Location: " . $redirectUrl);
    exit; 
}

require __DIR__ . '/../../PHP/conexion.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario    = trim($_POST["usuario"] ?? "");
    $contrasena = $_POST["contrasena"] ?? "";

    // Verificamos directamente si los campos requeridos están vacíos
    if (empty($usuario) || empty($contrasena)) {
        $error = "Usuario y contraseña son obligatorios.";
    } else {
        
        /* ---------- 2. Buscar el usuario de forma segura ---------- */
        $stmt = $conectar->prepare(
            "SELECT id, nombre, usuario, contrasena FROM usuarios WHERE usuario = ? LIMIT 1"
        );
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();
        $stmt->close();

        /* ---------- 3. Verificar hash y crear sesión ---------- */
        if ($fila && password_verify($contrasena, $fila["contrasena"])) {
            
            // Seguridad de sesión
            session_regenerate_id(true);
            $_SESSION["userSession"] = [
                "type"     => "users",
                "id"       => (int) $fila["id"],
                "username" => $fila["usuario"],
                "nombre"   => $fila["nombre"],
            ];

            $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
            // NOTA: Principal.php / PrincipalING.php deben renombrarse a .php
            // para poder leer $_SESSION y mostrar el estado de sesión.
            $redirectUrl = $isEnglish ? "PrincipalING.php" : "Principal.php";

            header("Location: " . $redirectUrl);
            exit;
        } else {
            // Error genérico si falla el usuario o la contraseña
            $error = "Usuario o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/register.css">
    <link rel="icon" type="image/png" href="../../MULTIMEDIA/Canrisk LOGO.svg">
</head>
<body>
    <div class="form">
        <a class="auth-brand" href="Principal.php">
            <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk">
            <span>Canrisk</span>
        </a>
        <form action="" method="POST" novalidate>
            <h1>Iniciar Sesión</h1>
            <?php if (!empty($error)): ?>
                <div class="auth-error" role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>
            <?php endif; ?>
            <span class="auth-subtitle">Ingresa tus datos para continuar</span>

            <div class="field-group">
                <label class="User-text" for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" class="username"
                       value="<?php echo htmlspecialchars($_POST['usuario'] ?? '', ENT_QUOTES); ?>"
                       maxlength="20" required>
            </div>

            <div class="field-group">
                <label class="User-text" for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" class="password" required>
            </div>

            <div class="submit-bttn">
                <button type="submit" class="submit-bttn" id="submit-bttn">Ingresa!</button>
            </div>

            <button type="button" class="regresar" onclick="window.history.back()">Regresar</button>

            <div class="register">
                <a class="resgis-txt" href="register.php">¿No tienes una cuenta?<br>Regístrate aquí</a>
            </div>
        </form>
    </div>

    <script src="../../JS/auth-validacion.js"></script>
</body>
</html>