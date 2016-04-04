<?php 
session_start();
?>
<?php
	

	include_once("funciones_bases_datos.php");
	$con =conexion($servidor, $usuario, $pass, $bdd);
		$user = $_POST["nombre"];

	$email= $_POST["email"];
	$tipo= $_POST["tipo"];


	
	
	
	unset($_SESSION['ERROR1']);
	unset($_SESSION['ERROR']);
		
	$query= "select * from usuario where nombre_usu='$user' ; ";
	$resultado= mysqli_query($con,$query);
	
	//echo $query;
	if(mysqli_num_rows($resultado)){
	$_SESSION["ERROR1"]="el nombre de usuario ya existe";
	header("location:registro.php");
	//echo $_SESSION["ERROR1"];
	
	}
	$query= "select * from usuario where correo='$email'  ;";
	$resultado= mysqli_query($con,$query);
	//echo $query;
	if(mysqli_num_rows($resultado)){
		$_SESSION["ERROR"]="El email  ya existe";
		header("location:registro.php");
		//echo $_SESSION["ERROR"];
	}
	
	

	
	if(!isset($_SESSION["ERROR"]) && !isset($_SESSION["ERROR1"])){
		$query = "insert into usuario(nombre_usu,correo,tipo) values('$user','$email',$tipo)";
		$resultado = mysqli_query($con, $query);
				$ultimo_id = mysqli_insert_id($con); 	
		       $_SESSION['codigo']=$ultimo_id;	
		
		
		if($resultado){
		
			
		
		if($resultado && $tipo==1){
	
	
			header("location:local.php");
		}

		if($resultado && $tipo==2){
		header("location:registro_fan.php");
		}

		if($resultado && $tipo==3){
		header("location:registro_musico.php");
		
		}
		else{
		echo "ko";
	}
	
	
	}
	
	
	}
	
	
	
		//$options = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];
	//$pass_encriptado = password_hash($pass, PASSWORD_BCRYPT, $options);
	
	//CON FUNCION CRYPT
	//$pass_encriptado = crypt($pass, '$2a$07$olakaseencriptasokases$');
	
	//CON FUNCION HASH

	

	
	mysqli_close($con);
?>