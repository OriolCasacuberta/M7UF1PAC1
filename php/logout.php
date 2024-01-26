<?php
session_start();
// Vaciamos la variable $_SESSION
$_SESSION = [];
// Eliminamos las cookies
setcookie(session_name(),'',time()-3600,'/');
// Destruye la sesion
session_destroy();
// Redirigimos al fichero index.php
header("Location: ../index.php");
exit();