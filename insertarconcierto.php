<?php
session_start();
?>

<?php
	 
	
	if(isset($_SESSION['nombre'])){
	include_once("funciones_bases_datos.php");
 $con =conexion($servidor, $usuario, $pass, $bdd);
		$nombre = $_POST["nombre"];
	$fecha = $_POST["fecha"];
	$genero= $_POST["genero"];
	$local=$_SESSION['codigo'];


		$query = "insert into concierto(cod_local,nombre_concierto,cod_genero,fecha) values('$local','$nombre', '$genero','$fecha')";
		$resultado = mysqli_query($con, $query);
		
		
	
		
			if(!$resultado){
			header("location:crearconcierto.php?id=".$_SESSION['codigo']."");
			
			}

		
	
	header("location:perfil_local.php?id=".$_SESSION['codigo']."");
	}
	
	else{
		
			echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
	}

	
	
	
	
		//$options = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];
	//$pass_encriptado = password_hash($pass, PASSWORD_BCRYPT, $options);
	
	//CON FUNCION CRYPT
	//$pass_encriptado = crypt($pass, '$2a$07$olakaseencriptasokases$');
	
	//CON FUNCION HASH

	

	
	mysqli_close($con);
		
?>