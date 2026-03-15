<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    echo "Acceso denegado.";
    exit();
}
?>

<a href="crear.php">Crear nuevo usuario</a>