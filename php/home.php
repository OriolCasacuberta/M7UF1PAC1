<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        // Redirigir a index.php si el usuario no ha iniciado sesión
        header("Location: ../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <title>Home Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/estils.css">
        <link rel="stylesheet" href="../css/home.css">

    </head>
    <body>
        <main>

            <!-- Buscar imagen de fondo y poner el texto por encima en cuado blanco con padding -->

            <h1>BENVINGUT</h1>
            <div id="fotoLogo"></div>

        </main>
        <aside>
            <button id="LogOut" class="button" type="submit"><span>Log out</span></button>
        </aside>
    </body>
</html>