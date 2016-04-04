<?php
    require_once("conexion.php");	
    function conexion($servidor, $usuario, $pass, $bdd){
	$con = mysqli_connect($servidor, $usuario, $pass, $bdd) or die ("ERROR CONEXION");
	mysqli_set_charset($con, "utf8");
	return $con;
    }	
    function consultar_conciertos($conexion, $inicio, $tamanyo){
	$query="SELECT * FROM concierto LIMIT $inicio, $tamanyo;";
	$result = mysqli_query($conexion, $query);
	return $result;
    }
    function numero_total_conciertos($conexion){
	$query="SELECT * FROM concierto;";
	$result = mysqli_query($conexion, $query);
	return mysqli_num_rows($result);
    }
?>