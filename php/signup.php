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
            <form method = "post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">

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
                
                <button class="button" type="submit" id="back"><a href="../index.php"><span>Back to Log in</span></a></button>
            </form>
        </main>
    </body>
</html>