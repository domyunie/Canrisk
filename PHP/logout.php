<?php
/* ============================================================
   CANRISK — Cerrar sesión
   ------------------------------------------------------------
   Destruye la sesión de PHP, limpia el "userSession" del
   navegador (localStorage) y reenvía al index.

   Uso:  ../PHP/logout.php          -> index en español
         ../PHP/logout.php?lang=en  -> index en inglés
   ============================================================ */
session_start();
 
// Elimina todas las variables de sesión
$_SESSION = [];
 
// Borra la cookie de sesión (si el navegador la usa)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        "",
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}
 
// Destruye la sesión en el servidor
session_destroy();
 
header("Location: ../HTML/ESPANOL/login.php");
exit;
?>
