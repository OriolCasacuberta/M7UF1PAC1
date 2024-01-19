<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <title>La meva web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./img/LogoIsitec.png"/>
        <link rel="stylesheet" href="./css/estils.css">
    </head>
    <body>
        <main>
            <form method = "post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">

                <!-- MAIL -->
                <label for="user">Correu Electrònic</label>
                <br>
                <input id="user" name="user" type="email" placeholder="Introdueix el teu correu electrònic" autofocus required>

                <br>
                <br>

                <!-- CONTRASENYA -->
                <label for="contrasenya">Contrasenya</label>
                <br>
                <input id="contrasenya" name="contrasenya" type="password" placeholder="Introdueix el teu password" required>

                <br>
                <br>

                <!-- SUBMIT -->
                <button class="button" type="submit"><span>Login</span></button>

                

            </form>
        </main>

        <aside>
            <p>Encara no tens un compte?</p>
            <button class="button" type="submit"><span>Sign in</span></button>
        </aside>
        
    </body>
</html>