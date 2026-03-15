<?php
session_start();
require_once("../config/conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password, $usuario['password'])) {

    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    header("Location: ../dashboard.php");
    exit();

} else {
    echo "Correo o contraseña incorrectos.";
}
?>