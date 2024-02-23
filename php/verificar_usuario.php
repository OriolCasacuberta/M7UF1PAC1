<?php
require_once "../lib/controlUserBD.php";

// Conectar a la base de datos
$conexion = getConnection();

// Verificar la conexión
if ($conexion->connect_error)
{
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el nombre de usuario de la solicitud GET
$username = $_GET['username'];

// Consultar si el usuario existe en la base de datos
$sql = "SELECT * FROM users WHERE username = '$username' OR mail = '$username'";
$resultado = $conexion->query($sql);

// Comprobar si se encontró el usuario
if ($resultado->num_rows > 0) echo 'existe';
else echo 'no_existe';

// Cerrar la conexión a la base de datos
$conexion->close();
?>