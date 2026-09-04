<?php
/* ============================================================
   CANRISK — Conexión a la base de datos (MySQL / MariaDB)
   ------------------------------------------------------------
   Este archivo lo incluyen login.php y register.php.
   Si tu MySQL usa otro usuario/clave, cámbialo aquí abajo.
   ============================================================ */

// ---- Datos de conexión (valores por defecto de WAMP) --------
$conectar = mysqli_connect('localhost', 'root', '', 'canrisk');

// ---- Crear la conexión -------------------------------------

if (!$conectar) {
    echo "No se pudo realizar la conexión con el servidor WAMPP";
} else {
    $base = mysqli_select_db($conectar, 'canrisk');

    if (!$base) {
        echo "No se pudo realizar la conexión con la base de datos";
    }
}
?>