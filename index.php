<!--PHP-->
<?php

    require "./lib/controlUserBD.php";


    function procesarLogIn()
    {
        htmlspecialchars($_SERVER["PHP_SELF"]); 

        // Mensaje de error
        $error = '';
        $strict = false;
        $esMail = false;
        $esUser = false;

        // Nos asseguramos que el metodo de REQUEST se POST
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(count($_POST)==2)
            {
                //echo "<scri;>console.log('Debug Objects: " . var_dump($_POST) . "' );</script>";

                //$username = $_POST["user"];
                $user = $_POST["user"];

                verificarSiEsUserOMail($user,$esMail,$esUser);
                //TODO: VERIFICAR SI ESTA ACTIVO
                $username = sanitize_user($user,$strict);
                $username = isset($_POST["user"]) ? $_POST["user"] : "";
                $pass     = isset($_POST["pass"]) ? filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING) : "";
                $logged   = verificaUsuari($username,$pass,$esMail,$esUser);
                $active   = $_POST["active"];

    function procesarLogIn(){
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
                $phpSelf = htmlspecialchars($_SERVER["PHP_SELF"]); 

                // Mensaje de error
                $error = '';
                $strict = false;
                $esMail = false;
                $esUser = false;

                
                echo "VARDUMP: ".var_dump($_POST);

                $user= $_POST["user"];
                $pass= $_POST["contrasenya"];

                    // Nos asseguramos que el metodo de REQUEST se POST
                
                    if(count($_POST)==2){
                        echo var_dump($_POST);
                        verificarSiEsUserOMail($user,$esMail,$esUser);
                        

                        //actualitzarDataLastLogIn();

                        $username = sanitize_user($user,$strict);
                        $username = isset($_POST["username"]) ? $_POST["username"] : "";
                        $pass     = isset($_POST["pass"]) ? filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING) : "";
                        
                        $logged   = verificaUsuari($username,$pass,$esMail,$esUser);
                        $active   = $_POST["active"];
                    
                        if($logged!==false && $active == 0)
                        {
                            //Creem la sessio
                            session_start();
                            $_SESSION['user'] = $logged['username'];
                            $_SESSION['pass'] = $logged['passHash']; 

                            //fem la redireccio
                            header("Location: ./php/home.php");
                            
                            //TODO: FUNCION LAST LOGIN 
                            actualitzarDataLastLogIn();

                            //exit()= recomendable por la redireccion de ficheros
                            exit();
                        }
                        else{
                            $error = "Revisa l'adreça de correu/username i/o la contrasenya";
                        } 


                    }
                    else $error = "Revisa l'adreça de correu/username i/o la contrasenya";
                }
                else $error = "User or Password are require!";
            }
        }
    }
}
?>

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
    </head>
    <body>
        <main>
            <h1>LOGIN ISITEC</h1>
            <form method = "post" action="<?php procesarLogIn()?>">
            <!-- MAIL -->
                <label for="user" class="labelInput"><b>EMAIL</b></label>
                <br>
                <input id="user" name="user" type="text" placeholder="Introdueix email o nom d'usuari" autofocus required class="labelInput">

                <br>

                <!--REVISAR ESTE INPUT-->
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
            </aside>
        </main>
    </body>
</html>