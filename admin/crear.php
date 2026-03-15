<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    echo "Acceso denegado.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>

<h2>Crear nuevo usuario</h2>

<form action="guardar.php" method="POST">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Rol:</label><br>
    <select name="rol">
        <option value="usuario">Usuario</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <button type="submit">Crear usuario</button>

</form>

<br>
<a href="../dashboard.php">Volver</a>

</body>
</html>