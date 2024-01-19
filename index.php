<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <title>Login Isitec</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./img/LogoIsitec.png"/>
        <link rel="stylesheet" href="./css/estils.css">
    </head>
    <body>
        <main>

            <h1>LOGIN ISITEC</h1>
            <form method = "post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <!-- MAIL -->
                <label for="user" class="labelInput">EMAIL</label>
                <br>
                <input id="user" name="user" type="email" placeholder="Introdueix el teu correu electrònic" autofocus required class="labelInput">

                <br>

                <!-- CONTRASENYA -->
                <label for="contrasenya" class="labelInput">PASSWORD</label>
                <br>
                <input id="contrasenya" name="contrasenya" type="password" placeholder="Introdueix la teva contrasenya" required class="labelInput">

                <br>

                <!-- SUBMIT -->
                <button class="button" type="submit"><span>Login</span></button>
            </form>
            
            <aside>
                <!-- SIGN UP -->
                <p>Encara no tens un compte?</p>
                <button class="button" type="submit"><span>Sign in</span></button>
            </aside>

        </main>
    </body>
</html>