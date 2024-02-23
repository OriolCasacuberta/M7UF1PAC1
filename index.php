<!--FORMULARI-->
<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <title>Login Isitec</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./img/LogoIsitec.png"/>
        <link rel="stylesheet" href="./css/estils.css">
        <link rel="stylesheet" href="./css/index.css">
        <script src="/js/script.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function()
            {
                var enlace = document.getElementById("fpass");
                enlace.addEventListener("click", function(event)
                {
                    event.preventDefault();
                    mostrarPopup();
                });
            });
        </script>
    </head>
    <body>
        <main>
            <h1>LOGIN ISITEC</h1>
            <form method = "post" action="./php/procesar_login.php">
                <!-- MAIL -->
                <label for="user" class="labelInput"><b>EMAIL</b></label>
                <br>
                <input id="user" name="user" type="text" placeholder="Introdueix email o nom d'usuari" autofocus required class="labelInput">

                <br>

                <!-- CONTRASENYA -->
                <label for="contrasenya" class="labelInput"><b>PASSWORD</b></label>
                <br>
                <input id="contrasenya" name="contrasenya" type="password" placeholder="Introdueix la teva contrasenya" required class="labelInput">

                <br>

                <!-- SUBMIT -->
                <button class="button" type="submit"><span>Login</span></button>
            </form>
            
            <aside>
                <!-- SIGN UP -->
                <p>Encara no tens un compte?</p>
                <button class="button" type="submit" class="signup"><a href="./php/signup.php"><span>Sign in</span></a></button>
                <br>
                <br>
                <a id="fpass" href="">Forgot Password?</a>
            </aside>
        </main>
    </body>
</html>