<?php

function getConnection(){
    $connString = 'mysql:host'. DB_HOST . ';port=3306;dbname=' . DB_DATABASE .';charset=utf8';
    $user = DB_USER;
    $pass = DB_PASSWORD;
    $db = null;
    try{
        $db = new PDO($connString,$user,$pass,[PDO::ATTR_PERSISTENT => True]);
    }catch(PDOException $e){
        echo "<p style=\"color:red;\">Error " . $e->getMessage() . "</p>";
    }finally{
        return $db;
    }
}

function sanitize_user($user,$strict){

    $raw_username = $user;
	$user     = wp_strip_all_tags( $user );
	$user     = remove_accents( $user );
	// Remove percent-encoded characters.
	$user = preg_replace( '|%([a-fA-F0-9][a-fA-F0-9])|', '', $user );
	// Remove HTML entities.
	$user = preg_replace( '/&.+?;/', '', $user );

	// If strict, reduce to ASCII for max portability.
	if ( $strict ) {
		$user = preg_replace( '|[^a-z0-9 _.\-@]|i', '', $user );
	}

	$user = trim( $user );
	// Consolidate contiguous whitespace.
	$user = preg_replace( '|\s+|', ' ', $user );

	return apply_filters( 'sanitize_user', $user, $raw_username, $strict );
}


function verificaUsuari($mail, $pass){
    $result = false;
    $conn   = getConnection();
    $sql    = "SELECT 'iduser','passHash' FROM `usuaris` WHERE 'mail'=:mail";

    try {
        
        $usuaris = $conn->prepare($sql);
        $usuaris->execute([':mail'=>$mail]);
        if($usuaris->rowCount()==1){
            $dadesUsuari = $usuaris->fetch(PDO::FETCH_ASSOC);
            if(password_verify($pass,$dadesUsuari['passHash'])){
                $result = ['iduser'=>$dadesUsuari['iduser'],'pass'=>$dadesUsuari['passHash']];
            }
        }

    } catch (PDOException $e) {
        echo "<p style=\"color:red;\">Error " . $e->getMessage() . "</p>";
    }
    finally{
        return $result;
    }
}


