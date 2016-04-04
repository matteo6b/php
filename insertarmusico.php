<?php
session_start();
?>

<?php
	 require_once("cript.php");
	if(isset($_SESSION['codigo'])){
	include_once("funciones_bases_datos.php");
 $con =conexion($servidor, $usuario, $pass, $bdd);
		$nombre = $_POST["nombre"];
	$telefono = $_POST["telefono"];
	$genero= $_POST["genero"];
		$direccion=$_POST["direccion"];
		$ciudad=$_POST["ciudad"];
	$pass=$_POST["pass"];
	$pass1=$_POST["pass1"];
		$info=$_POST["informacion"];
		$edad=$_POST["edad"];
		unset($_SESSION['ERROR5']);
	unset($_SESSION['ERROR8']);
	
		$options = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];

              $pass_encriptado = password_hash($pass, PASSWORD_BCRYPT, $options);
              
              $options1 = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];

              $pass_encriptado1 = password_hash($pass1, PASSWORD_BCRYPT, $options1);
              
              
	if($pass_encriptado!=$pass_encriptado1){
		
		$_SESSION["ERROR5"]="las contraseñas no coinciden";

		echo "<meta http-equiv='Refresh' content='0;url=registro_musico.php'>";
		
		
	}
	if($telefono>9){
		$_SESSION["ERROR8"]="numero incorrecto";
		
			echo "<meta http-equiv='Refresh' content='0;url=registro_musico.php'>";
	}
		
		
		
		
	
	


		$query = "update usuario set nombre_grupo='$nombre', telefono='$telefono', genero_musico=$genero,cod_ciudad=$ciudad,direccion='$direccion', pass='$pass_encriptado', descripcion_musico='$info',edad=$edad where codigo_usuario='".$_SESSION['codigo']."' ;";
		$resultado = mysqli_query($con, $query);

		
			if(!$resultado){
			echo "ko";
			echo $query;
			}

		
	else{
	echo "<meta http-equiv='Refresh' content='0;url=login.php'>";

	}
	
	}
	
	else{
		
			echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
	}
	
	
	
	
	

	
	mysqli_close($con);
		
?>