<?php
/*------------------ REGISTRAR USUARIO -------------------*/
session_start();
if (isset($_SESSION["userSession"])) {
    $isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
    $redirectUrl = $isEnglish ? "PrincipalING.php" : "Principal.php";
    
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

    /* ---------- 1. Validación Simplificada (Estilo "Reg") ---------- */
    // Verificamos si hay campos vacíos de forma directa
    if (empty($nombre) || empty($usuario) || empty($contrasena)) {
        $error = "Todos los campos requeridos deben ser completados.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $usuario)) {
        $error = "El usuario debe tener entre 4 y 20 caracteres (letras, números o guión bajo).";
    } elseif (mb_strlen($contrasena) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } else {
        
        /* ---------- 2. Verificar si el usuario ya existe ---------- */
        $stmt = $conectar->prepare("SELECT id FROM usuarios WHERE usuario = ? LIMIT 1");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error = "Ese nombre de usuario ya está en uso. Elige otro.";
        } else {
            
            /* ---------- 3. Insertar el nuevo usuario ---------- */
            $hash  = password_hash($contrasena, PASSWORD_DEFAULT);
            $fecha = date("Y-m-d");
            
            $sql = "INSERT INTO usuarios (nombre, usuario, contrasena, fecha_registro) VALUES (?, ?, ?, ?)";
            $stmt = $conectar->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $usuario, $hash, $fecha);

            if ($stmt->execute()) {
                $success = true;
            } else {
                $error = "No se pudo completar el registro. Inténtalo de nuevo.";
            }
        }
        $stmt->close(); // Cerramos el statement una sola vez al final
    }
}

$isEnglish   = strpos($_SERVER["REQUEST_URI"], "/INGLES/") !== false;
$loginUrl    = $isEnglish ? "loginING.php" : "login.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate - Canrisk</title>
    <link rel="stylesheet" href="../../CSS/register.css">
    <link rel="icon" type="image/png" href="../../MULTIMEDIA/Canrisk LOGO.svg">
</head>
<body>
    <?php if ($success): ?>
    <script>
        alert("¡Registro exitoso! Ya puedes iniciar sesión.");
        window.location.href = <?php echo json_encode($loginUrl); ?>;
    </script>
    <?php endif; ?>

    <div class="form">
        <a class="auth-brand" href="Principal.php">
            <img src="../../MULTIMEDIA/Canrisk LOGO.svg" alt="Canrisk">
            <span>Canrisk</span>
        </a>
        <form action="" method="POST" novalidate>
            <h1>¡Crea una cuenta de Canrisk!</h1>
            <?php if (!empty($error)): ?>
                <div class="auth-error" role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>
            <?php endif; ?>
            <span class="auth-subtitle">Regístrate para acceder a todo el contenido</span>

            <div class="field-group">
                <label class="User-text" for="name">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Ingrese su nombre" class="name"
                       value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>"
                       minlength="3" maxlength="50" required>
            </div>

            <div class="field-group">
                <label class="User-text" for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" class="username"
                       value="<?php echo htmlspecialchars($_POST['usuario'] ?? '', ENT_QUOTES); ?>"
                       pattern="[a-zA-Z0-9_]{4,20}" maxlength="20" required>
            </div>

            <div class="field-group">
                <label class="User-text" for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" class="password"
                       minlength="6" required>
            </div>

            <div class="submit-bttn">
                <button type="submit" class="submit-bttn" id="submit-bttn">Crear cuenta</button>
            </div>

            <button type="button" class="regresar" onclick="window.history.back()">Regresar</button>

            <div class="register">
                <a class="resgis-txt" href="login.php">¿Ya tienes una cuenta?<br>Ingresa a Canrisk</a>
            </div>
        </form>
    </div>

    <script src="../../JS/auth-validacion.js"></script>
</body>
</html>
