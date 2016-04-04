<?php
session_start();
?>

<?php

if(isset($_SESSION['nombre'])){
include_once("funciones_bases_datos.php");
	$con =conexion($servidor, $usuario, $pass, $bdd);



$rechazar=$_POST['rechazar'];




foreach($rechazar as $codigov){
	$query="update votacion_concierto set puntuacion=3 where  codigov=$codigov ;";
mysqli_query($con, $query);
echo $query;
}

mysqli_close($con);



header("location: perfil_local.php?id=".$_SESSION['codigo']."");
}
else{
	
		echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
}

?>