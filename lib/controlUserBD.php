<?php
//include "wp-includes/formatting.php";


function getConnection()
{
    $connString = 'mysql:host'. DB_HOST . ';port=3306;dbname=' . DB_DATABASE .';charset=utf8';
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $db = null;
    try
    {
        $db = new PDO($connString,$user,$pass,[PDO::ATTR_PERSISTENT => True]);
    }
    catch(PDOException $e)
    {
        echo "<p style=\"color:red;\">Error " . $e->getMessage() . "</p>";
    }
    finally
    {
        return $db;
    }
}

function sanitize_user($user,$strict)
{
    $raw_username = $user;
	$user     = wp_strip_all_tags($user);
	$user     = remove_accents($user);
	// Remove percent-encoded characters.
	$user = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '', $user);
	// Remove HTML entities.
	$user = preg_replace( '/&.+?;/', '', $user );

	// If strict, reduce to ASCII for max portability.

	if ( $strict ) $user = preg_replace( '|[^a-z0-9 _.\-@]|i', '', $user );

	if ( $strict ) {
		$user = preg_replace('|[^a-z0-9 _.\-@]|i', '', $user);
	}


	$user = trim( $user );
	// Consolidate contiguous whitespace.
	$user = preg_replace('|\s+|', ' ', $user);

	return apply_filters('sanitize_user', $user, $raw_username, $strict);
}

function verificarSiEsUserOMail($user,&$esMail,&$esUser)
{
    if (substr_count($user, '@') == 1) $esMail=true;
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
            echo "<p style=\"color:red;\">Error " . $e->getMessage() . "</p>";
        }
    }
    else
    {
        $sql = "SELECT iduser, username, passHash  FROM usuaris WHERE username=:username";
        try
        {
            
            $usuarisName = $conn->prepare($sql);
            $usuarisName->execute([':mail'=>$user]);
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
            echo "<p style=\"color:red;\">Error " . $e->getMessage() . "</p>";
        }  
    }
    return $result;
}


function usuarioExistente($conn, $username, $email) {

    $stmt = $conn->prepare("SELECT iduser FROM users WHERE username = $username OR mail = $email");
    //ss, represta que le pasamos 2 string 
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;
    $stmt->close();

    return $rows > 0;
}
?>



