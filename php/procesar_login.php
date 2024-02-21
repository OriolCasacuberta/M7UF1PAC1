<?php
require_once "../lib/controlUserBD.php";

function procesarLogIn() {
    // Mensaje de error
    $error = '';
    $strict = false;
    $esMail = false; 
    $esUser = false;

    // Nos aseguramos que el método de REQUEST sea POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["user"]) && isset($_POST["contrasenya"])) {
            $user = $_POST["user"];
            $pass = $_POST["contrasenya"];

            verificarSiEsUserOMail($user, $esMail, $esUser);
            $username = sanitize_user($user, $strict);
            
            // Verifica si el usuario está activo
            $logged = verificaUsuari($username, $pass, $esMail, $esUser);
            $active = isset($_POST["active"]) ? $_POST["active"] : null;

            if ($logged !== false && $active == 0) 
            {
                // Creamos la sesión
                session_start();
                $_SESSION['user'] = $logged['username'];
                $_SESSION['pass'] = $logged['passHash'];

                // Redireccionamos al usuario a la página de inicio
                header("Location: ./php/home.php"); 
                exit(); // Recomendable salir después de redireccionar
            } else {
                $error = "Revisa el correo electrónico/username y/o la contraseña";
            }
        } else {
            $error = "Usuario y contraseña son requeridos";
        }
    }
}

// Llamamos a la función para que procese el inicio de sesión
procesarLogIn();
?>

