<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <title>Sign Up Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./img/LogoIsitec.png"/>
        <link rel="stylesheet" href="./css/estils.css">
    </head>
    <body>
        <main>
            <form method = "post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">

                <!-- USERNAME -->
                <label for="user"><b>Username</b></label>
                <br>
                <input id="username" name="user" type="text" placeholder="Introdueix el nom d'usuari" autofocus required>

                <br>
                <br>

                <!-- MAIL -->
                <label for="email"><b>Email</b></label>
                <br>
                <input id="email" name="email" type="email" placeholder="Introdueix el correu electrònic" autofocus required>

                <br>
                <br>

                <!-- FIRST NAME -->
                <label for="firstName"><b>First Name</b></label>
                <br>
                <input id="firstName" name="firstName" type="text" placeholder="Introdueix el nom" autofocus required>

                <br>
                <br>

                <!-- LAST NAME -->
                <label for="lastName"><b>Last Name</b></label>
                <br>
                <input id="lastName" name="lastName" type="text" placeholder="Introdueix el cognom" autofocus required>

                <br>
                <br>

                <!-- CONTRASENYA -->
                <label for="contrasenya"><b>Password</b></label>
                <br>
                <input id="contrasenya" name="contrasenya" type="password" placeholder="Introdueix el password" required>

                <br>
                <br>

                <!-- VERIFY CONTRASENYA -->
                <label for="verifyContrasenya"><b>Verify Password</b></label>
                <br>
                <input id="verifyContrasenya" name="verifyContrasenya" type="password" placeholder="Torna a escriure la contrasenya" required>

                <br>
                <br>

                <!-- SUBMIT -->
                <button class="button" type="submit"><span>Sign Up</span></button>

                

            </form>
        </main>
    </body>
</html>