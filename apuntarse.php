<?php
session_start();
if(isset($_SESSION['nombre'])){
	include_once("funciones_bases_datos.php");
 $con =conexion($servidor, $usuario, $pass, $bdd);
$codigo= $_GET['codigo'];
$codigo_musico=$_SESSION['codigo'];
$puntuacion=1;




$query="insert into  votacion_concierto(cod_concierto,cod_fan  , puntuacion) values ($codigo,$codigo_musico, $puntuacion);";
$resultado = mysqli_query($con, $query);

	echo $query;		
			header("location:musico.php?id=".$_SESSION['codigo']."");
}
else{
	
			echo "<meta http-equiv='Refresh' content='0;url=index.php'>";

}
			







?>