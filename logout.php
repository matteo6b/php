<?php
    session_start();
 include_once("funciones_bases_datos.php");
	$con =conexion($servidor, $usuario, $pass, $bdd);
    
    if(isset($_SESSION['nombre'])) {
        session_destroy();
        header("location: login.php");
    }else {
        echo "Operación incorrecta.";
    }
?> 