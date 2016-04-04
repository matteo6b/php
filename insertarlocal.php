<?php
session_start();
?>

<?php

if(isset($_SESSION['codigo'])){
	include_once("funciones_bases_datos.php");
 $con =conexion($servidor, $usuario, $pass, $bdd);
	
 require_once("cript.php");
		$telefono = $_POST["telefono"];
	$descripcion = $_POST["descripcion"];
	$ciudad= $_POST["ciudad"];
	$persona= $_POST["persona"];
	$direccion=$_POST["direccion"];
	$pass=$_POST["pass"];
	$pass1=$_POST["pass1"];
		unset($_SESSION['ERROR5']);
		
		
		
		$options = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];

              $pass_encriptado = password_hash($pass, PASSWORD_BCRYPT, $options);
              
              $options1 = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];

              $pass_encriptado1 = password_hash($pass1, PASSWORD_BCRYPT, $options1);
	
	
	if($pass_encriptado!=$pass_encriptado1){
		
		$_SESSION["ERROR5"]="las contraseñas no coinciden";
	header("location:local.php");
		
		
		
	}
	else{
		$query = "update usuario set telefono='$telefono',descripcion_local='$descripcion',cod_ciudad=$ciudad,persona_contacto='$persona',direccion='$direccion', pass='$pass_encriptado' where codigo_usuario='".$_SESSION['codigo']."';";
		$resultado = mysqli_query($con, $query);
				if($resultado){
			echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
			
			}	

	
		
			else {
			echo "ko";
			echo $query;
			
			}

		
	
	
	
	}
	}
	
	else{
	
	echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
	
	}
	
	

	
	
	
	

	

	
	mysqli_close($con);
	
?>