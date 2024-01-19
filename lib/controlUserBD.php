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


