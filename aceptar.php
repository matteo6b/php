<?php
session_start();
if(isset($_SESSION['nombre'])){
include_once("funciones_bases_datos.php");
 $con =conexion($servidor, $usuario, $pass, $bdd);



$codigo=$_GET['codigo'];
echo "$codigo <br>";
$query="update votacion_concierto set puntuacion=2 where cod_concierto=$codigo ;";
$resultado=mysqli_query($con,$query);
$query="select cod_fan from votacion_concierto v ,concierto c,usuario u where v.cod_concierto=$codigo  and puntuacion=2 and u.codigo_usuario=v.cod_fan; ;" ;
$resultado1= mysqli_query($con, $query);
$fila1=mysqli_fetch_array($resultado1);
extract($fila1);


$query1="update votacion_concierto set puntuacion=3 where cod_concierto=$codigo     and cod_fan!=$cod_fan  ;";
	
$resultado1=mysqli_query($con,$query1);


if( $resultado && $resultado1){


header("location:perfil_local.php?id=".$_SESSION['codigo']."");

}
else{
	echo "$query <br>";
	echo $query1;
echo "ko";
}




mysqli_close($con);
}
else{
	echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
	
}
?>