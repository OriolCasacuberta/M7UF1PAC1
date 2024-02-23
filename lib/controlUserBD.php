<?php

define('DB_HOST', 'localhost');
define('DB_DATABASE', 'isitec');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

function getConnection()
{
    $connString = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8';
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $db = null;

    try
    {
        $db = new PDO($connString, $user, $pass, [PDO::ATTR_PERSISTENT => true]);
    } catch (PDOException $e) { 
        echo "<p style=\"color:red;\">Error " . $e->getMessage() . "</p>";
    } finally {
        return $db;
    }
}

function sanitize_user($user,$strict = false)
{
   // Eliminar etiquetas HTML
   $user = strip_tags($user);
    
   // Eliminar acentos
   $user = iconv('UTF-8', 'ASCII//TRANSLIT', $user);
   
   // Eliminar caracteres especiales
   $user = preg_replace('/[^a-zA-Z0-9 _.\-@]/', '', $user);
   
   // Reducir a ASCII si strict es true
   if ($strict) $user = preg_replace('/[^a-zA-Z0-9_\-@]/', '', $user);
   
   // Eliminar espacios adicionales
   $user = trim($user);
   $user = preg_replace('/\s+/', ' ', $user);
   
   return $user;
}

function verificarSiEsUserOMail($user,&$esMail,&$esUser)
{
    if (filter_var($user, FILTER_VALIDATE_EMAIL)) $esMail=true;
    else $esUser=true;
}

function verificaUsuari($user, $pass,$esMail,$esUser)
{
    $result = false;
    $conn   = getConnection();

    if($esMail==true)
    {
        $sql = "SELECT iduser, username, passHash FROM usuaris WHERE mail=:mail";
        try
        {
            $usuarisMail = $conn->prepare($sql);
            $usuarisMail->execute([':mail'=>$user]);
            if($usuarisMail->rowCount()==1)
            {
                $dadesUsuari = $usuarisMail->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pass,$dadesUsuari['passHash']))
                {
                    $result = ['iduser'=>$dadesUsuari['iduser'], 'user'=> $dadesUsuari['username'],'pass'=>$dadesUsuari['passHash']];
                }
            }
        } 
        catch (PDOException $e)
        {
            error_log("Error de base de datos (mails): " . $e->getMessage(), 3, "error.log");
            echo "<p style=\"color:red;\">Ocurrió un error, por favor inténtalo de nuevo más tarde</p>";
        }
    }
    else
    {
        $sql = "SELECT iduser, username, passHash  FROM usuaris WHERE username=:username";
        try
        {
            
            $usuarisName = $conn->prepare($sql);
            $usuarisName->execute([':username'=>$user]);
            if($usuarisName->rowCount()==1)
            {
                $dadesUsuari = $usuarisName->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pass,$dadesUsuari['passHash']))
                {
                    $result = ['iduser'=>$dadesUsuari['iduser'], 'user'=> $dadesUsuari['username'],'pass'=>$dadesUsuari['passHash']];
                }
            }
        } 
        catch (PDOException $e)
        {
            error_log("Error de base de datos (users): " . $e->getMessage(), 3, "error.log");
            echo "<p style=\"color:red;\">Ocurrió un error, por favor inténtalo de nuevo más tarde</p>";
        }  
    }
    
    return $result;
}




