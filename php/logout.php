<?php
session_start();
//vaciamos la variable $_SESSION
$_SESSION = [];
//eliminamos las cookies
setcookie(session_name(),'',time()-3600,'/');
//destruye la sesion
session_destroy();
//redirigimos al fichero index.php
header("Location: ../index.php");
exit();