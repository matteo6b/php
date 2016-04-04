<?php
session_start();
	require_once("cript.php");
	include_once("funciones_bases_datos.php");
 $con =conexion($servidor, $usuario, $pass, $bdd);
		$user = $_POST["nombre"];
	$pass1 = $_POST["pass"];

$options = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];

              $pass_encriptado = password_hash($pass1, PASSWORD_BCRYPT, $options);
	
	$query= "select codigo_usuario,	nombre_usu,pass,tipo from usuario where nombre_usu='$user' and pass='$pass_encriptado';";
	$resultado= mysqli_query($con,$query);
	if($total=mysqli_fetch_array($resultado)){
	extract($total);
	$_SESSION['codigo']=$codigo_usuario;
	$_SESSION['nombre']=$nombre_usu;
	$_SESSION['tipo']=$tipo;
	
	
		if($_SESSION['tipo']==1){
	

			header("location:perfil_local.php?id=".$_SESSION['codigo']."");
			
		}
	
	if($_SESSION['tipo']==2){
	

			header("location:fan.php?id=".$_SESSION['codigo']."");
			
		}
	
	if($_SESSION['tipo']==3){
	

			header("location:musico.php?id=".$_SESSION['codigo']."");
			
		}
	
	
	
	
	
	
	
	
	}
	else{
	
		$_SESSION["ERROR3"]="el usuario y la contraseña no coinciden";
	header("Location:login.php");
	
	
	
	}
	


?>

