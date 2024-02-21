<?php
    require "./../lib/controlUserBD.php";

    //CONECTAR CON LA BASE DE DADTOS
    $conn = getConnection();
    
    function procesarSignUp(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST["user"];
            $email = $_POST["email"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $password = $_POST["contrasenya"];
            $verifyPassword = $_POST["verifyContrasenya"];

            if (usuarioExistente($conn, $username, $email)) {
                echo "Error: El usuario o correo electrónico ya existe.";
            }
            else{
                // Verificar si las contraseñas coinciden
                if ($password === $verifyPassword) {
                    // Hash de la contraseña
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insertar nuevo usuario en la base de datos
                    $stmt = $conn->prepare("INSERT INTO users (mail, username, passHash, userFirstName, userLastName, creationDate, active) VALUES ($email, $username, $hashedPassword, $firstName, $lastName, NOW(), 1)");
                    $stmt->bind_param("sssss", $email, $username, $hashedPassword, $firstName, $lastName);

                    if ($stmt->execute()) {
                        header("Location: ../index.php");
                    } else {
                        echo "Error al registrar el usuario: " . $stmt->error;
                    }

                    $stmt->close();
                
                }
                else {
                    echo "Error: Las contraseñas no coinciden.";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <title>Sign Up Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./img/LogoIsitec.png"/>
        <link rel="stylesheet" href="../css/estils.css">
        <link rel="stylesheet" href="../css/signup.css">
    </head>
    <body>
        <main>

            <h1>CREATE ACCOUNT</h1>

            <form method = "post" action="<?=procesarSignUp()?>">


                <!-- USERNAME -->
                <label for="user"><b>USERNAME</b></label>
                <br>
                <input id="username" name="user" type="text" placeholder="Introdueix el nom d'usuari" autofocus required>

                <br>
                <br>

                <!-- MAIL -->
                <label for="email"><b>EMAIL</b></label>
                <br>
                <input id="email" name="email" type="email" placeholder="Introdueix el correu electrònic" autofocus required>

                <br>
                <br>

                <!-- FIRST NAME -->
                <label for="firstName"><b>FIRST NAME</b></label>
                <br>
                <input id="firstName" name="firstName" type="text" placeholder="Introdueix el nom" autofocus required>

                <br>
                <br>

                <!-- LAST NAME -->
                <label for="lastName"><b>LAST NAME</b></label>
                <br>
                <input id="lastName" name="lastName" type="text" placeholder="Introdueix el cognom" autofocus required>

                <br>
                <br>

                <!-- CONTRASENYA -->
                <label for="contrasenya"><b>PASSWORD</b></label>
                <br>
                <input id="contrasenya" name="contrasenya" type="password" placeholder="Introdueix el password" required>

                <br>
                <br>

                <!-- VERIFY CONTRASENYA -->
                <label for="verifyContrasenya"><b>VERIFY PASSWORD</b></label>
                <br>
                <input id="verifyContrasenya" name="verifyContrasenya" type="password" placeholder="Torna a escriure la contrasenya" required>

                <br>
                <br>

                <!-- SUBMIT -->
                <button class="button" type="submit" id="signUpButton"><span>Sign Up</span></button>
                
                
            </form>
            <button class="button" type="submit" id="back"><a href="../index.php"><span>Back to Log in</span></a></button>
        </main>
    </body>
</html>