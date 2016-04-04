<?php
session_start();
?>

<?php
	if(isset($_SESSION['codigo'])){
  require_once("cript.php");
	require_once("database.php");
	$db = new DataBase();
	$nombre = $_POST["nombre"];
	$telefono = $_POST["telefono"];
	$edad=$_POST["edad"];
	$ciudad=$_POST["ciudad"];
	$pass=$_POST["pass"];
	$pass1=$_POST["pass1"];
		unset($_SESSION['ERROR5']);
	
	
	$options = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];

              $pass_encriptado = password_hash($pass, PASSWORD_BCRYPT, $options);
              
              $options1 = ['cost' => 7, 'salt' => 'BCryptRequires22Chrcts'];

              $pass_encriptado1 = password_hash($pass1, PASSWORD_BCRYPT, $options1);
	
	
	if($pass_encriptado!=$pass_encriptado1){
		
		$_SESSION["ERROR5"]="las contraseñas no coinciden";
	echo "<meta http-equiv='Refresh' content='0;url=registro_fan.php'>";
		
		
		
	}
	
	else{

		$query = "update usuario set nombre_fan='$nombre', telefono='$telefono', cod_ciudad=$ciudad,edad='$edad', pass='$pass_encriptado'  where codigo_usuario='".$_SESSION['codigo']."' ;";
		$db->executer($query);

		
	echo "<meta http-equiv='Refresh' content='0;url=login.php'>";
	
	}
	
	
	

	}
	else{
	
	echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
	
	}
	
	

	

$db->disconnect();

		
?>