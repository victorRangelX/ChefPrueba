<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="Estilo/EstiloIndex.css">
</head>
<body>

<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
<p>Tu rol es: <?php echo $_SESSION['rol']; ?></p>

<hr>

<?php if ($_SESSION['rol'] === 'admin'): ?>
    
    <h2>Panel de Administración</h2>
    <ul>
        <li><a href="admin/usuarios.php">Gestionar usuarios</a></li>
        <li><a href="admin/recetas.php">Ver todas las recetas</a></li>
    </ul>

<?php else: ?>

    <h2>Panel de Usuario</h2>
    <ul>
        <li><a href="generar_receta.php">Generar receta</a></li>
        <li><a href="mis_recetas.php">Mis recetas</a></li>
    </ul>

<?php endif; ?>

<br>
<a href="auth/logout.php">Cerrar sesión</a>

</body>
</html>