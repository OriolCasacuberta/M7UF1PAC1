<!--PHP-->
<?php
    //menssaje de error
    $error = '';

    //nos asseguramos que el metodo de REQUEST se POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(count($_POST)==2){
            //filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL) =VERIFICA QUE SIGUI UN EMAIL I EVITA INJECCIONS DE DADES
            $user   = isset($_POST["user"]) ? filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL) : "";
            $pass   = isset($_POST["pass"]) ? filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING) : "";
            $logged = verificaUsuari($mail,$pass);
            
            if($logged!==false){
                //creem la sessio
                session_start();
                
                //$_SESSION['user'] = $logged['idUsuari'];
                //$_SESSION['pass'] = $logged['name']; 
                //fem la redireccio
                header("Location: ./php/home.php");
                //exit()= recomendable por la redireccion de ficheros
                exit();
            }else{
                $error = "Revisa l'adreça de correu/username i/o la contrasenya";
            }

        }
        else{
            $error = "User or Password are require!";
        }


    }
?>

<!--FORMULARI-->
<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <title>La meva web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/jpg" href="./img/LogoIsitec.png"/>
        <link rel="stylesheet" href="./css/estils.css">
    </head>
    <body id="bodyIndex">
        <main>
            <form method = "post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">

                <h1>Login ISITEC</h1>

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

                <p>Encara no tens un compte?</p>
                <button class="button" type="submit"><span>Sign in</span></button>

            </form>
        </main>
    </body>
</html>